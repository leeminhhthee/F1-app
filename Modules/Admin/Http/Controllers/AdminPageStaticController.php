<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\PageStatic;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminPageStaticController extends Controller
{
    public function index()
    {
        $pages = PageStatic::Paginate(5);
        return view('admin::page_static.index', compact('pages'));
    }
    public function create()
    {
        return view('admin::page_static.create');
    }
    public function store(Request $request)
    {
        $this->insertOrUpdate($request);
        return redirect()->back()->with('success','Add page static successfull !!!');
    }
    public function edit($id)
    {
        $page = PageStatic::find($id);
        return view('admin::page_static.update', compact('page'));
    }
    public function update(Request $request, $id)
    {
        $this->insertOrUpdate($request, $id);
        return redirect()->back()->with('success','Update page static successfull !!!');
    }
    public function insertOrUpdate($request, $id='')
    {
        $page = new PageStatic();
        if($id) $page = PageStatic::find($id);

        $page->ps_name = $request->ps_name;
        $page->ps_content = $request->ps_content;
        $page->ps_type = $request->type;
        $page->ps_type_slug = str_slug($request->type);
        $page->save();


        return view('admin::page_static.index');
    }
    public function action(Request $request, $action, $id)
    {
        $messages = '';
        if ($action) {
            $page = PageStatic::find($id);
            switch ($action)
            {
                case 'delete':
                    $page->delete();
                    $messages = "Delete page static successful !!!";
                    break;
            }
        }
        return redirect()->back()->with('success', $messages);
    }
}
