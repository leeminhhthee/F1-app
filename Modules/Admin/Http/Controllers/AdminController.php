<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Order;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Transaction;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $ratings = Rating::with('user:id,name','product:id,pro_name,pro_slug')
                ->limit(10)->get();
        $contacts = Contact::limit(10)->get();

        //don hang moi nhat
        $transactionNews = Transaction::with('user')->limit(5)->orderByDesc('id')->get();

        //doanh thu ngay
        $moneyDay = Transaction::whereDay('updated_at', date('d'))
                        ->where('tr_status', Transaction::STATUS_DONE)
                        ->sum('tr_total');
        //doanh thu thang
        $moneyMonth = Transaction::whereMonth('updated_at', date('m'))
                        ->where('tr_status', Transaction::STATUS_DONE)
                        ->sum('tr_total');
        //doanh thu nam
        $moneyYear = Transaction::whereYear('updated_at', date('Y'))
                        ->where('tr_status', Transaction::STATUS_DONE)
                        ->sum('tr_total');

        //tong so user
        $totalUser = User::all()->count();
        //tong so san pham
        $totalProduct = Product::all()->count();
        //tong so bai viet
        $totalOrder = Order::all()->count();
        //tong so review
        $totalRating = Rating::all()->count();

        $viewData = [
            'ratings' => $ratings,
            'contacts' => $contacts,
            'moneyDay' => $moneyDay,
            'moneyMonth' => $moneyMonth,
            'moneyYear' => $moneyYear,
            'transactionNews' => $transactionNews,
            'totalUser' => $totalUser,
            'totalProduct' => $totalProduct,
            'totalOrder' => $totalOrder,
            'totalRating' => $totalRating
        ];
                
        return view('admin::index', $viewData);
    }
}
