<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ShoppingCartController extends FrontendController
{
    /**
     * them gio hang
     */
    public function addProduct(Request $request, $id)
    {
        $product = Product::select('pro_name', 'id', 'pro_slug', 'pro_price', 'pro_sale', 'pro_avatar', 'pro_number')->find($id);
        if (!$product) return redirect('/');
        $price = $product->pro_price;
        if ($product->pro_sale)
        {
            $price = $price * (100 - $product->pro_sale)/100;
        }
        if($product->pro_number == 0)
        {
            return redirect()->back()->with('warning','The product is out of stock !!!');
        }
        Cart::add([
            'id' => $id, 
            'name' => $product->pro_name, 
            'qty'=> 1, 
            'price' => $price, 
            'weight' => 0,
            'options'=> [
                'avatar' => $product->pro_avatar,
                'sale' => $product->pro_sale,
                'slug' => $product->pro_slug,
                'price_old' =>$product->pro_price
                ]
        ]);
        return redirect()->back()->with('success','Add to your cart successfully !!!');
    }
    //update cart
    public function increaseQty($rowID)
    {
        $product = Cart::get($rowID);
        $qty = $product->qty + 1;
        Cart::update($rowID, $qty); 
        return redirect()->back()->with('success','Update cart successfully !!!');
    }
    public function decreaseQty($rowID)
    {
        $product = Cart::get($rowID);
        $qty = $product->qty - 1;
        Cart::update($rowID, $qty); 
        return redirect()->back()->with('success','Update cart successfully !!!');
    }

    public function deleteProductItem($key)
    {
        Cart::remove($key);
        return redirect()->back();
    }
    public function destroyProduct()
    {

        Cart::destroy();
        return redirect()->back()->with('success', 'Remove all cart !!!');
    }
    /**
     * list gio hang
     */
    public function getListShoppingCart()
    {
        $products = Cart::content();
        return view('shopping.index', compact('products'));
    }
    /**
     * form thanh toan
     */
    public function getFormPay()
    {
        $products = Cart::content();
        return view('shopping.pay', compact('products'));
    }

    /**
     * Luu thong tin gio hang
     */
    public function saveInfoShoppingCart(Request $request)
    {
        $totalMoney = str_replace(',','',Cart::subtotal(0, 3));
        $transactionID = Transaction::insertGetId([
            'tr_user_id' => get_data_user('web'),
            'tr_total' => (int)$totalMoney,
            'tr_note' => $request->note,
            'tr_address' => $request->address,
            'tr_phone' => $request->phone,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        if ($transactionID)
        {
            $products = Cart::content();
            foreach($products as $product)
            {
                Order::insert([
                    'or_transaction_id' => $transactionID,
                    'or_product_id' => $product->id,
                    'or_qty' => $product->qty,
                    'or_price' => $product->options->price_old,
                    'or_sale' => $product->options->sale
                ]);
            }
        }
        Cart::destroy();

        return redirect()->route('home');
    }
}
