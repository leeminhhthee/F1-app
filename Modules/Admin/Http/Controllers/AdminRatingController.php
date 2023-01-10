<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Product;
use App\Models\Rating;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $ratings = Rating::with('user:id,name','product:id,pro_name,pro_slug,pro_avatar');
        $ratings = $ratings->orderBy('id', 'DESC')->paginate(4);

        $viewData = [
            'ratings'  => $ratings
        ];
        return view('admin::rating.index', $viewData);
    }
    public function action(Request $request, $action, $id)
    {
        if ($action) {
            $rating = Rating::find($id);
            switch ($action)
            {
                case 'delete':
                    $products = DB::table('products')
                            ->select('products.id')
                            ->join('ratings', 'ratings.ra_product_id','=','products.id')
                            ->where('ratings.id',$id)->get();
                    $product = Product::find($products[0]->id);
                    $product->pro_total_number = $product->pro_total_number - $rating->ra_number;
                    $product->pro_total_rating = $product->pro_total_rating - 1;
                    $product->save();

                    $rating->delete();
                    break;
            }
        }

        return redirect()->back();
    }

}
