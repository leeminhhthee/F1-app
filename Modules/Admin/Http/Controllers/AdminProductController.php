<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestProduct;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;


class AdminProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('category'); 
        
        $categories = $this->getCategries();

        if ($request->name) $products->where('pro_name', 'like', '%'.$request->name.'%');
        if ($request->cate) $products->where('pro_cate_id','=', $request->cate);
 
        $products = $products->orderByDesc('id')->paginate(10);
        $viewData = [
            'products' => $products,
            'categories' => $categories
        ];
        return view('admin::product.index', $viewData);
    }
    public function create()
    {
        $categories = $this->getCategries();
        return view('admin::product.create', compact('categories'));
    }
    public function store(RequestProduct $requestProduct)
    {
        $this->insertOrUpdate($requestProduct);
        return redirect()->back()->with('success', 'Add new product succesful!!!');
    }
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = $this->getCategries();
        return view('admin::product.update', compact('product'), compact('categories'));
    }
    public function update(RequestProduct $requestProduct, $id)
    {
        $this->insertOrUpdate($requestProduct, $id);
        return redirect()->back()->with('success', 'Edit product succesful!!!');
    }
    public function getCategries()
    {
        return Category::all();
    }
    public function insertOrUpdate(RequestProduct $requestProduct, $id='')
    {
        $product = new Product();

        if ($id) $product = Product::find($id);

        $product->pro_name = $requestProduct->pro_name;
        $product->pro_slug = str_slug($requestProduct->pro_name);
        $product->pro_cate_id = $requestProduct->pro_cate_id;
        $product->pro_price = $requestProduct->pro_price;
        $product->pro_sale = $requestProduct->pro_sale;
        $product->pro_content = $requestProduct->pro_content;
        $product->pro_description = $requestProduct->pro_description;
        $product->pro_title_seo = $requestProduct->pro_title_seo ? $requestProduct->pro_title_seo : $requestProduct->pro_name;
        $product->pro_description_seo = $requestProduct->pro_description_seo ? $requestProduct->pro_description_seo : $requestProduct->pro_description_seo;
        $product->pro_number = $requestProduct->pro_number;  
        
        if ($requestProduct->hasFile('pro_avatar'))
        {
            $file = upload_image('pro_avatar');
            if (isset($file['name']))
            {
                $product->pro_avatar = $file['name'];
            }
        }
        
        $product->save();
    }
    public function action(Request $request, $action, $id)
    {
        if ($action) {
            $messages = [];
            $product = Product::find($id);
            $rating = DB::table('ratings')->where('ratings.ra_product_id','=',$id);
            switch ($action)
            {
                case 'delete':
                    $product->delete();
                    $rating->delete();
                    $messages = 'Delete product succesful!!!';
                    break;
                case 'active':
                    $product->pro_active = $product->pro_active ? 0 : 1;
                    $product->save();
                    $messages = 'Change active product succesful!!!';
                    break;
                case 'hot':
                    $product->pro_hot = $product->pro_hot ? 0 : 1;
                    $product->save();
                    $messages = 'Change hot product succesful!!!';
                    break;
            }
        }

        return redirect()->back()->with('success', $messages);
    }
}
