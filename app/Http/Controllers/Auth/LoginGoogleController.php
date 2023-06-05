<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginGoogleController extends Controller
{
    public function index(){
        try {

            $user = Socialite::driver('google')->user();
            $existed = User::where('social_id', $user->id)->first();

            if($existed){

                Auth::login($existed);

                return redirect()->route('document.home.index');

            }else{
                $newUser = User::firstOrCreate([
                    'social_id'=> $user->id,
                ],
                    [
                    'name' => $user->name,
                    'email' => $user->email,
                    'avatar' => $user->avatar,
                    'social_type'=> 'google',
                    'password' => encrypt('my-google'),
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime(),
                ]);
                Auth::login($newUser);
                return redirect()->route('document.home.index');
            }

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
