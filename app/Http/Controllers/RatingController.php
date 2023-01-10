<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Rating;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RatingController extends FrontendController
{
    public function saveRating(Request $request, $id)
    {
        if ($request->ajax())
        {
            Rating::insert([
                'ra_product_id' => $id,
                'ra_number' => $request->number,
                'ra_content' => $request->r_content,
                'ra_user_id' => get_data_user('web'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            $product = Product::find($id);
            $product->pro_total_number += $request->number;
            $product->pro_total_rating += 1;
            $product->save();

            return response()->json(['code' => '1']);
        }
    }
}
