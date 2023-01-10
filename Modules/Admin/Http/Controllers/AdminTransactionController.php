<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $transactions = Transaction::with('user');
        $transactions = $transactions->orderBy('id','DESC')->paginate(7);
        $viewData = [
            'transactions' => $transactions
        ];

        return view('admin::transaction.index', $viewData);
    }

    public function viewOrder(Request $request, $id)
    {
        $views  = DB::table('products')
                ->join('orders', 'products.id', '=', 'orders.or_product_id')
                ->join('transaction', 'transaction.id', '=', 'orders.or_transaction_id')
                ->join('users', 'users.id', '=', 'transaction.tr_user_id')
                ->where('transaction.id', '=', $id)
                ->get();
        $viewData = [
            'views' => $views,
            'id' => $id
        ];  

        return view('admin::transaction.view', $viewData);
    }
    public function action(Request $request, $action, $id)
    {
        if ($action) {
            $order = Transaction::find($id);
            switch ($action)
            {
                case 'delete':
                    $order->delete();
                    break;
            }
        }
        return redirect()->back()->with('success','Deleted order successfull !!!');
    }
    /**
     * Xu ly trang thai don hang
     */
    public function actionTransaction($id)
    {
        $transation = Transaction::find($id);
        $orders = Order::where('or_transaction_id', $id)->get();

        if ($orders)
        {
            //tru di so luong cua san pham
            //tang bien pay cua san pham
            foreach($orders as $order) 
            {
                $product = Product::find($order->or_product_id);
                if ($product->pro_number > $order->or_qty) {
                    $product->pro_number = $product->pro_number - $order->or_qty;
                    $product->pro_pay += $order->or_qty;
                    $product->save();
                } else return redirect()->back()->with('danger', 'Số lượng sản phẩm không đủ !!!');
            }
        }
        //update user 
        DB::table('users')->where('id',$transation->tr_user_id)
                        ->increment('total_pay');
                        
        //cap nhat lai trang thai don hang     
        $transation->tr_status = Transaction::STATUS_DONE;
        $transation->save();

        return redirect()->back()->with('success', 'Hoàn thành đơn !!!');
    }
    public function generatePDF($id)
    {
        $transactions = Transaction::with('user');
        $transactions = $transactions->orderBy('id','DESC')->paginate(7);
        $views  = DB::table('products')
                ->join('orders', 'products.id', '=', 'orders.or_product_id')
                ->join('transaction', 'transaction.id', '=', 'orders.or_transaction_id')
                ->join('users', 'users.id', '=', 'transaction.tr_user_id')
                ->where('transaction.id', '=', $id)
                ->get();
        $viewData = [
            'views' => $views,
            'transactions' => $transactions, 
            'id' => $id
        ];  
    
        return view('admin::transaction.myPDF', $viewData);
    }
}
