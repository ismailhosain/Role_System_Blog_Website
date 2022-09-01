<?php

namespace App\Http\Controllers\admin;

use App\Models\post;
use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\admin\postRequest;

class PostController extends Controller
{
    public function index(){

        $getpost=post::all();

        return view('admin.posts.index',compact('getpost'));
    }

    public function create(){
        $category=category::where('status','0')->get();  //status e jar value 0 shudu ta dropdown e dekhanor jonno
        return view('admin.posts.create',compact('category'));
    }

    public function store(postRequest $request){

            $data=$request-> validated();

            $post=new post;

            $post->category_id=$data['category_id']; //$category->name(model_name) = $request['name'](validation name)
            $post->name=$data['name'];
            $post->slug=Str::slug($data['slug']);
            $post->description=$data['description'];
            $post->yt_frame=$data['yt_frame'];
            $post->meta_title=$data['meta_title'];
            $post->meta_description=$data['meta_description'];
            $post->meta_keyword=$data['meta_keyword'];
            $post->status=$request['status']== true ? '1' : '0';
            $post->created_by=Auth::user()->id;
            $post->save();

            return redirect('admin/posts')->with('messege','Post inserted successfully');

    }

    public function edit($post_id){

        $category=category::where('status','0')->get();

        $post=post::find($post_id);

        return view('admin.posts.edit',compact('post','category'));

    }

     public function update(postRequest $reqeust, $post_id){

     $data=$reqeust->validated();

     $post=post::find($post_id);

     $post->category_id=$data['category_id'];
     $post->name= $data['name']; //$post->name(model_name) = $request['name'](validation name)
     $post->slug= Str::slug($data['slug']);
     $post->description= $reqeust['description'];
     $post->meta_title=$data['meta_title'];
     $post->meta_description=$data['meta_description'];
     $post->meta_keyword=$data['meta_keyword'];
     $post->status=$reqeust['status'] == true ? '1' : '0';
     $post->created_by=Auth::user()->id;
     $post->update();

     return redirect('admin/posts')->with('messege','Post Updated successfully');


     }

       public function destroy($post_id){

       $post=post::find($post_id);

       $post->delete();

       return redirect('admin/posts')->with('status','Post Deleted successfully');

       }

}
