<?php

namespace App\Http\Controllers;
use App\Http\Requests\SavePostRequest;
use App\Models\Post;

use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
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
        $tags = Tag::all();
        return view("create")->with('tags', $tags);
    }

    public function save(SavePostRequest $request){

        $post = new Post($request->all());
        $post->user()->associate(Auth::user());
        $post ->save();
        $post->tags()->attach($request->tags);
        $id = $post->id;
        return redirect()->route("posts.show",$id);
    }

    public function edit($id){
        $post=Post::findOrFail($id);
        $tags = Tag::all();
        return view("edit")->with(["post"=>$post, "tags"=>$tags]);
    }

    public function update(Request $request, $id){
        $post = Post::findOrFail($id);
        $post->update($request->all());
        $post->tags()->sync((array)$request->input('tags'));

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
