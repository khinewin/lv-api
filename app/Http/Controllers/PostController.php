<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function deletePost($id){
        $post=Post::whereId($id)->first();
        if($post){
            $post->delete();
            $data=["status"=>"success", "msg"=>"The post has been deleted."];
            return response()->json($data, 200);
        }else{
            $data=["status"=>"failed", "msg"=>"Post not found."];
            return response()->json($data, 404);
        }
    }
    public function updatePost(Request $request){
      //  return response()->json($request->all());
          $request->validate([
            'title'=>"required", 
            "content"=>"required"
        ]);
        $id=$request->id;
        $post=Post::whereId($id)->first();
        if($post){
            $post->title=$request->title;
            $post->content=$request->content;
            $post->update();
            $data=["status"=>"success", "data"=>$post];
            return response()->json($data, 200);
        }else{
             $data=["status"=>"failed", "msg"=>"Post not found."];
            return response()->json($data, 404);
        }
    }
    public function getPostById($id){
        $post=Post::whereId($id)->first();
        if($post){
            $data=["status"=>"success", "data"=>$post];
            return response()->json($data, 200);
        }else{
            $data=["status"=>"failed", "msg"=>"Post not found."];
            return response()->json($data, 404);
        }
    }
    public function createPost(Request $request){
        $request->validate([
            'title'=>"required", 
            "content"=>"required"
        ]);
        $post=new Post();
        $post->title=$request->title;
        $post->content=$request->content;
        $post->save();
        $data=["status"=>"success", "data"=>$post];
        return response()->json($data, 201);
    }
    public function getPosts(){
        $posts=Post::OrderBy("id", "desc")->get();
        return response()->json($posts, 200);
    }
}
