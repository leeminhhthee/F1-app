<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestPassword;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends FrontEndController
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * show tong quan user
     */
    public function index()
    {
        $transactions         = Transaction::where('tr_user_id', get_data_user('web'));
        $listTransaction      = $transactions;

        $transactions = $transactions->addSelect('id','tr_total','tr_address','tr_phone','created_at','tr_status')->paginate(10);

        $totalTransaction     = $listTransaction->select('id')->count();
        $totalTransactionDone = $listTransaction->where('tr_status', Transaction::STATUS_DONE)
                                            ->select('id')
                                            ->count();
        $totalRating = DB::table('ratings')
                        ->where('ra_user_id', get_data_user('web'))
                        ->distinct()
                        ->count();

        $viewData = [
            'totalTransaction' => $totalTransaction,
            'totalTransactionDone' => $totalTransactionDone,
            'totalRating' => $totalRating,
            'transactions' => $transactions
        ];
        return view('user.index', $viewData);
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
            'views' => $views
        ];  

        return view('user.view', $viewData);
    }
    public function updateInfo()
    {
        $user = User::find(get_data_user('web'));

        return view('user.info', compact('user'));
    }
    public function saveUpdateInfo(Request $request)
    {
        $user = User::where('id', get_data_user('web'))
                ->update($request->except('_token'));
        return redirect()->back()->with('success', 'Update information succesfully !!!');
    }
    public function updatePassword()
    {
        return view('user.password');
    }
    public function saveUpdatePassword(RequestPassword $requestPassword)
    {
        if (Hash::check($requestPassword->password_old, get_data_user('web','password')))
        {
            $user = User::find(get_data_user('web'));
            $user->password = bcrypt($requestPassword->password);
            $user->save();

            return redirect()->back()->with('success', 'Change password successfully !!!');
        }
        return redirect()->back()->with('danger', 'Old password is not correct !!!');
    }
    public function getProductPay()
    {
        $products = Product::orderBy('pro_pay','DESC')->limit(10)->get();
        return view('user.product_selling', compact('products'));
    }
}
