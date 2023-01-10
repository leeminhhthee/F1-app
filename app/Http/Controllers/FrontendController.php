<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PageStatic;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FrontendController extends Controller
{
    public function __construct()
    {
        $categories = Category::all();
        $pages = PageStatic::all();
        
        View::share('categories', $categories);
        View::share('pages', $pages);
    }
}
