<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(Request $request, $id){
        $user = User::where('id', $id)->first();
        return view('frontend_v4.pages.users.profile', compact('user'));
    }
}
