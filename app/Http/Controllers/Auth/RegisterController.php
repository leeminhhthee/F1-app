<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontendController;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends FrontendController
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    public function __construct()
    {
        parent::__construct();
    }

    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->save();

        if ($user->id)
        {
            $email = $user->email;
            $code = bcrypt(md5(time().$email));
            $url = route('user.verify.account', ['id' => $user->id, 'code' => $code]);
           
            $user->code_active = $code;
            $user->time_active = Carbon::now();
            $user->save();
            
            $data = [
                'route' => $url
            ];
            
            Mail::send('email.verify_account',$data, function($message) use ($email) {
                $message->to($email,'Verify Account')->subject("VUROT Shop: Verify Account !");
            });
            
            return redirect()->route('get.login')->with('success','Password reset link has been sent to your email, please check your email !!');
        }

        return redirect()->back();
    }
    public function verifyAccount(Request $request)
    {
        $code = $request->code;
        $id = $request->id;
        $checkUser = User::where([
            'code_active' => $code,
            'id' => $id
        ])->first();

        if(!$checkUser)
        {
            return redirect('/')->with('danger','The verify account path is not correct! Please try again later.');
        }
        $checkUser->active = 2;
        $checkUser->save();

        return redirect('/login')->with('success','Verify account successfully! Thank you.');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
