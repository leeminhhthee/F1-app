<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getListProduct(Request $request)
    {
        $url = $request->segment(2);
        $url = preg_split('/(-)/i', $url);
        $products = Product::where("pro_active", Product::STATUS_PUBLIC);

        if ($id = array_pop($url)) {
            $cateProduct = Category::find($id);
            $products->where('pro_cate_id',$id);
            
            if ($request->price) {
                $price = $request->price;
                switch ($price)
                {
                    case '1':
                        $products->where('pro_price', '<', 1000000);
                        break;
                    case '2':
                        $products->whereBetween('pro_price',[1000000,5000000]);
                        break;
                    case '3':
                        $products->whereBetween('pro_price',[5000000,10000000]);
                        break;
                    case '4':
                        $products->whereBetween('pro_price',[10000000,20000000]);
                        break;
                    case '5':
                        $products->whereBetween('pro_price',[20000000,30000000]);
                        break;
                    case '6':
                        $products->where('pro_price', '>', 30000000);
                        break;
                    default:
                        $products;
                        break;
                }
            }

            if ($request->orderby) {
                $orderby = $request->orderby;
                switch ($orderby)
                {
                    case 'desc':
                        $products->orderBy('id','DESC');
                        break;
                    case 'asc':
                        $products->orderBy('id','ASC');
                        break;
                    case 'price_max':
                        $products->orderBy('pro_price','ASC');
                        break;
                    case 'price_min':
                        $products->orderBy('pro_price','DESC');
                        break;
                    default:
                        $products->orderBy('id','DESC');
                        break;
                }
            }
            $products = $products->simplePaginate(6);
            $viewData = [
                'products' => $products,
                'cateProduct' => $cateProduct,
                'query' => $request->query()
            ];
            return view('product.index', $viewData);
        }
        
        if ($request->k) {
            $products->where('pro_name','like','%'.$request->k.'%');
            $products = $products->simplePaginate(6);
        }

        $viewData = [
            'products' => $products,
            'query' => $request->query()
        ];
        return view('product.index', $viewData);
    }
    public function getAllProduct(Request $request)
    {
        $allProduct = Product::where("pro_active", Product::STATUS_PUBLIC);
        if ($request->price) {
            $price = $request->price;
            switch ($price)
            {
                case '1':
                    $allProduct->where('pro_price', '<', 1000000);
                    break;
                case '2':
                    $allProduct->whereBetween('pro_price',[1000000,5000000]);
                    break;
                case '3':
                    $allProduct->whereBetween('pro_price',[5000000,10000000]);
                    break;
                case '4':
                    $allProduct->whereBetween('pro_price',[10000000,20000000]);
                    break;
                case '5':
                    $allProduct->whereBetween('pro_price',[20000000,30000000]);
                    break;
                case '6':
                    $allProduct->where('pro_price', '>', 30000000);
                    break;
                default:
                    $allProduct;
                    break;
            }
        }

        if ($request->orderby) {
            $orderby = $request->orderby;
            switch ($orderby)
            {
                case 'desc':
                    $allProduct->orderBy('id','DESC');
                    break;
                case 'asc':
                    $allProduct->orderBy('id','ASC');
                    break;
                case 'price_max':
                    $allProduct->orderBy('pro_price','ASC');
                    break;
                case 'price_min':
                    $allProduct->orderBy('pro_price','DESC');
                    break;
                default:
                    $allProduct->orderBy('id','DESC');
                    break;
            }
        }
        if ($request->k) {
            $allProduct->where('pro_name','like','%'.$request->k.'%');
            $allProduct = $allProduct->simplePaginate(9);
            $viewData = [
                'allProduct' => $allProduct,
                'query' => $request->query()
            ];
            return view('product.all', $viewData);
        }
        $allProduct = $allProduct->simplePaginate(12);
        $viewData = [
            'allProduct' => $allProduct,
            'query' => $request->query()
        ];
        return view('product.all', $viewData);
    }
}
