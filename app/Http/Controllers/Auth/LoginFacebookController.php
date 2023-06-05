<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginFacebookController extends Controller
{
    /**
     * @throws \Exception
     */
    public function index(){
        try {
            $user = Socialite::driver('facebook')->user();

            dd($user);
        }catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
