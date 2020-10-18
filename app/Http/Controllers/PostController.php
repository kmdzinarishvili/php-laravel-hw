<?php

namespace App\Http\Controllers;
use App\Models\Post;

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
    public function save(Request $request){
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
