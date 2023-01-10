<?php

namespace App\Http\Controllers;

use App\Models\PageStatic;
use Illuminate\Http\Request;

class PageStaticController extends FrontEndController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getPage(Request $request)
    {
        $url = $request->segment(2);
        $page = PageStatic::where('ps_type_slug', $url)->first();

        return view('page_static', compact('page'));
    }
    // public function aboutUs()
    // {
    //     $page = PageStatic::where('ps_type', PageStatic::TYPE_ABOUT)->first();
    //     return view('page_static.about', compact('page'));
    // }
    // public function delInfor()
    // {
    //     $page = PageStatic::where('ps_type', PageStatic::TYPE_INFO_SHOPPING)->first();
    //     return view('page_static.delInfor', compact('page'));
    // }
    // public function security()
    // {
    //     $page = PageStatic::where('ps_type', PageStatic::TYPE_SERCURITY)->first();
    //     return view('page_static.security', compact('page'));
    // }
    // public function rules()
    // {
    //     $page = PageStatic::where('ps_type', PageStatic::TYPE_RULES)->first();
    //     return view('page_static.rules', compact('page'));
    // }

}
