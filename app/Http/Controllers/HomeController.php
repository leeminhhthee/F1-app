<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;

class HomeController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $productHot = Product::where([
            'pro_hot' => Product::HOT_ON,
            'pro_active' =>Product::STATUS_PUBLIC
        ])->limit(50)->get();

        $articleNews = Article::where([
            'a_active' =>Article::STATUS_PUBLIC,
            'a_hot' => Article::HOT
        ])->limit(3)->get();

        $categoriesHome = Category::with('products')
                ->where('c_home',Category::HOME)
                ->limit(3)
                ->get(); 

        //kiem tra nguoi dung dang nhap
        $productSuggest = [];
        if (get_data_user('web'))
        {
            $transactions = Transaction::where([
                'tr_user_id' => get_data_user('web'),
                'tr_status' => Transaction::STATUS_DONE,
            ])->pluck('id');
            if (!empty($transactions))
            {
                $listId = Order::whereIn('or_transaction_id',$transactions)->distinct()->pluck('or_product_id');
                if(!empty($listId))
                {
                    $listIdCategory = Product::whereIn('id', $listId)->distinct()->pluck('pro_cate_id');
                    if ($listIdCategory)
                    {
                        $productSuggest = Product::whereIn('pro_cate_id',$listIdCategory)->limit(4)->get();
                    }
                }
            }
        }
        //neu chua thi bo qua

        $viewData =[
            'productHot' => $productHot,
            'articleNews' => $articleNews,
            'categoriesHome' => $categoriesHome,
            'productSuggest' => $productSuggest
        ];
        return view('home.index', $viewData);
    }

    public function renderProductView(Request $request)
    {
        if ($request->ajax())
        {
            $listID = $request->id;
            $products = Product::whereIn('id', $listID)->orderBy('id','DESC')->limit(4)->get();
            $html = view('components.product_view', compact('products'))->render();

            return response()->json(['data' => $html]);
        }
    }
}
