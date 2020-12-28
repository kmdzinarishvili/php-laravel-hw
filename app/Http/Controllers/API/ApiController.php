<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class ApiController extends Controller
{
    public function register(Request $request){
        $validateData = $request->validate([
            "name" => "required",
            "email" => "email|required",
            "password" => "required|confirmed"
        ]);
        $validateData["password"] = bcrypt($request->password);
        $user = User::create($validateData);
        $accessToken = $user->createToken("authToken")->accessToken;
        return response(["user" => $user, "access_token" =>$accessToken]);
    }
    public function login(Request $request){
        $loginData = $request->validate([
            "email" => "email|required",
            "password" => "required"
        ]);
        if (!auth()->attempt($loginData)){
            return response (["message" => "Invalid Username or Password"]);
        }
        $accessToken = auth()->user()->createToken("authToken")->accessToken;
        return response(["user" => auth()->user(), "access_token" => $accessToken]);
    }

}
