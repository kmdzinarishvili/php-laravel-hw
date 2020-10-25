<?php

namespace App\Http\Controllers;
use App\Http\Requests\SavePostRequest;
use App\Models\Post;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(){
        $post = Post::all();
        return view('posts')->with("posts", $post);

    }

    public function show($id){

        $post = Post::findOrFail($id);
        //$post = Post::where('id', $id)->get();
        return view("post")-> with("post", $post);


    }
    public function create(){
        return view("create");
    }

    public function save(SavePostRequest $request){
        //best not to write this in controller
        //best to take this in model

//        $request_rules = [
//            "title"=>["required", "max:255", "min:3"],
//            "post_text"=>"required|min:2",
//            "likes"=>"required"
//        ];

//        $messages = [
//            'required' => 'The :attribute field is required!!!!',
//        ];
//
//        $validator = Validator::make($request->all(), $request_rules, $messages);
//        $validator->validate();
        //we can do more than just check required

        $post = new Post($request->all());
        $post ->save();
        return redirect()->back();
    }

    public function edit($id){
        $post=Post::findOrFail($id);

        return view("edit")->with("post",$post);
    }

    public function update(Request $request, $id){
        $post = Post::findOrFail($id);
        $post->update($request->all());

        return redirect()->route("posts.show",$id);
    }
    public function delete(Post $post){
        try {
            $post->delete();
        } catch (\Exception $e) {
        }
        return redirect()->back();
    }
}
