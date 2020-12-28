<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class UserController extends Controller
{
    public function index(){
        return User::all();
        //return response("okay", 200);
    }
    public function create(){
        return view("create");
    }
    public function store(Request $request){
        $user = new User($request->all());
        $user->password = bcrypt($request->password);
//        dd($request->file("image"));

        $imgName = Str::random(16).'.jpg';
        $request->file('image')->move(public_path('images'),$imgName );
        $user->image = $imgName;
        //$user.save()
        return redirect()->route('users.create');
    }
    public function show(User $user){
        return $user;
    }
}
