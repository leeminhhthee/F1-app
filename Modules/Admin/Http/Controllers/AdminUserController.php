<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $users = User::whereRaw(1);
        $users = $users->orderBy('id', 'DESC')->paginate(6);
        $viewData = [
            'users' => $users
        ];

        return view('admin::user.index', $viewData);
    }
    public function action(Request $request, $action, $id)
    {
        if ($action) {
            $messages = [];
            $users = User::find($id);
            switch ($action)
            {
                case 'delete':
                    $users->delete();
                    $messages = 'Delete user succesful!!!';
                    break;
                case 'active':
                    if ($users->active == 1)
                    {
                        $users->active = 2;
                    } else {
                        $users->active = 1;
                    }
                    $users->save();
                    $messages = 'Change active user succesful!!!';
                    break;
            }
        }

        return redirect()->back()->with('success', $messages);
    }
}
