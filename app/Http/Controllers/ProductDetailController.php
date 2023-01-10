<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class ProductDetailController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function productDetail(Request $request)
    {
        $url = $request->segment(2);
        $url = preg_split('/(-)/', $url);
        $id = array_pop($url);
        //$productDetail = Product::where('pro_active', Product::STATUS_PUBLIC)->find($id);
        $productDetail = DB::table('products')->select('categories.c_slug','categories.c_name','products.pro_name',
                'products.id','products.pro_avatar','products.pro_price','products.pro_sale','products.pro_description',
                'products.pro_content', 'categories.id AS c_id','products.pro_total_rating','products.pro_total_number',)
                ->join('categories', 'products.pro_cate_id', '=', 'categories.id')
                ->where('pro_active', Product::STATUS_PUBLIC)
                ->where('products.id',$id)
                ->get();

        $ratings = DB::table('ratings')->select('ratings.ra_number','ratings.ra_product_id','ratings.ra_content','ratings.created_at',
                    'users.name', 'users.avatar')
                    ->join('users','ratings.ra_user_id','=','users.id')
                    ->join('products','ratings.ra_product_id','=','products.id')
                    ->where('products.id',$id)
                    ->get();

        $checkBuy = DB::table('ratings')
                    ->join('transaction','transaction.tr_user_id','=','ratings.ra_user_id')
                    ->join('products','ratings.ra_product_id','=','products.id')
                    ->join('orders','orders.or_transaction_id','=','transaction.id')
                    ->where('ratings.ra_product_id',$id)
                    ->where('orders.or_product_id',$id)
                    ->get(); 
        
                    
        if (count($checkBuy) == 0){
            $check = 0;
        } else {
            $check = 1;
        }

        //gom nhom de tinh so luong moi sao
        $ratingsDashboard = Rating::groupBy('ra_number')
                    ->where('ra_product_id', $id)
                    ->select(DB::raw('count(ra_number) as total'), DB::raw('sum(ra_number) as sum'))   
                    ->addSelect('ra_number')
                    ->get()->toArray();

        $arrayRatings = [];
                    
        if(!empty($ratingsDashboard))
        {
            for ($i=1;$i<=5;$i++)
            {
                $arrayRatings[$i] = [
                    "total" => 0,
                    "sum" => 0,
                    "ra_number" => 0,
                ];
                foreach($ratingsDashboard as $item)
                {
                    if($item['ra_number'] == $i)
                    {
                        $arrayRatings[$i] = $item;
                        continue;
                    } 
                }
            }
        }

        $viewData = [
            'productDetail' => $productDetail,
            'ratings' => $ratings,
            'check' => $check,
            'arrayRatings' => $arrayRatings
        ];
        
        return view('product.detail', $viewData);

    }
}
