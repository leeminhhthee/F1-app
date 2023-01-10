<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestCategory;
use App\Models\Category;
use App\Models\Models\Category as ModelsCategory;
use App\Models\Product;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);

        $viewData = [
            'categories' => $categories
        ];
        return view('admin::cate.index', $viewData);
    }
    public function create()
    {
        return view('admin::cate.create');
    }
    public function store(RequestCategory $requestCategory)
    {
        $this->insertOrUpdate($requestCategory);
        return redirect()->back()->with('success', 'Add new category succesful!!!');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin::cate.update', compact('category'));
    }
    public function update(RequestCategory $requestCategory, $id)
    {
        $this->insertOrUpdate($requestCategory, $id);
        return redirect()->back()->with('success', 'Edit category succesful!!!');
    }
    public function insertOrUpdate(RequestCategory $requestCategory, $id='')
    {
        $category = new Category();

        if ($id) $category = Category::find($id);

        $category->c_name = $requestCategory->CategoryName;
        $category->c_slug = str_slug($requestCategory->CategoryName);
        $category->c_title_seo = $requestCategory->c_title_seo ? $requestCategory->c_title_seo : $requestCategory->CategoryName;
        $category->c_description_seo = $requestCategory->c_description_seo;


        if ($requestCategory->hasFile('avatar'))
        {
            $file = upload_image('avatar');
            if (isset($file['name']))
            {
                $category->c_avatar = $file['name'];
            }
        }
        $category->save();
        
    }
    public function action(Request $request, $action, $id)
    {
        $messages = '';
        if ($action) {
            $category = Category::find($id);
            switch ($action)
            {
                case 'delete':
                    //xoa san pham thuoc cate do
                    $products = Product::where('pro_cate_id','=', $id)->paginate(); 
                    foreach ($products as $product)
                    {
                        $product->delete();
                    }
                    //xoa cate
                    $category->delete();
                    $messages = "Delete category successful !!!";
                    break;
                case 'active':
                    $category->c_active = $category->c_active ? 0 : 1;
                    $messages = "Changed status successful !!!";
                    $category->save();
                    break;
                case 'home':
                    $category->c_home = $category->c_home ? 0 : 1;
                    $messages = "Changed display mode successful !!!";
                    $category->save();
                    break;
            }
        }

        return redirect()->back()->with('success', $messages);
    }
}
