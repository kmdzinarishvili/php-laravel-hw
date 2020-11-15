<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
      public function register(){
          return view('user.register');

        }
        public function postRegister(){

            $this->validate(request(), [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required'
            ]);
            $user = User::create(request(['name', 'email', 'password']));
            auth()->login($user);

            return redirect()->route('my.posts');


        }
        public function login(){
            return view('user.login');

        }
        public function postLogin(Request $request){
            //LoginRequests rom viyenebdi errors migdebda
            $request = $request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);
            $credentials = $request;

            if(Auth::attempt($credentials)){
                return redirect()->route('my.posts');
            } else{
                abort(403);
            }
        }

        public function logout(){
            Auth::logout();
            return redirect()->route('login');
        }
        public function myPosts(){
            $post = Post::all();
            return view('my_posts')->with("posts", $post);

        }

}
