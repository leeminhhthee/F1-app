<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminWarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function getWarehouseProduct(Request $request)
    {
        $products = Product::with('category'); 
        $column = 'id';
        if ($request->type && $request->type == 'pay')
        {
            $column = 'pro_pay';
            $products->where('pro_pay','>',0);
        } else
        {
            $products->where('pro_number', '>=', 8);
        }
        
        $categories = $this->getCategries();

        if ($request->name) $products->where('pro_name', 'like', '%'.$request->name.'%');
        if ($request->cate) $products->where('pro_cate_id','=', $request->cate);
 
        $products = $products->orderByDesc($column)->Paginate(10);
        $viewData = [
            'products' => $products,
            'categories' => $categories,
            'query' => $request->query()
        ];
        return view('admin::warehouse.index', $viewData);
    }
    public function getCategries()
    {
        return Category::all();
    }
}
