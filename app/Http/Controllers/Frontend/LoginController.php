<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function getLogin()
    {
        if (Auth::check()) {
            // nếu đăng nhập thàng công thì
            return redirect(route('document.home.index'));
        } else {
            return view('auth.login');
        }

    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');
        $user = User::where('email', $email)->where('password', $password)->first();

        if ($user) {
            if (Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ])) {
                return redirect('/');
            }
        }
        Session::flash('error', 'Email hoặc password không chính xác');
        return redirect()->back();

    }
}
