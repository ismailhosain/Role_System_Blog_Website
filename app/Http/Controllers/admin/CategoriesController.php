<?php

namespace App\Http\Controllers\admin;

use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\admin\categoryRequest;

class CategoriesController extends Controller
{
    public function index(){

        $category=category::all();

        return view('admin.categories.index',compact('category'));
    }

    public function create(){

        return view('admin.categories.create');
    }

    public function store(categoryRequest $reqeust)

   {
            $data=$reqeust->validated();

            $category=new category;

            $category->name= $data['name']; //$category->name(model_name) = $request['name'](validation name)
            $category->slug= Str::slug($data['slug']);
            $category->description= $reqeust['description'];

            if($reqeust ->hasfile('image')){
               $file=$reqeust->file('image');
               $filename=time(). "." .$file->getClientOriginalExtension();
               $file->move('upload/category/',$filename);
               $category->image=$filename;
            }

            $category->meta_title=$data['meta_title'];
            $category->meta_description=$data['meta_description'];
            $category->meta_keyword=$data['meta_keyword'];
            $category->navbar_status=$reqeust['navbar_status'] == true ? '1' : '0';
            $category->status=$reqeust['status'] == true ? '1' : '0';
            $category->created_by=Auth::user()->id;
            $category->save();

            return redirect('admin/categories')->with('messege','category inserted successfully');
   }

   public function edit($category_id)
   {

    $category=category::find($category_id);

    return view('admin.categories.edit',compact('category'));

   }

   public function update(categoryRequest $reqeust, $category_id){

    $data=$reqeust->validated();

    $category=category ::find($category_id);

    $category->name= $data['name']; //$category->name(model_name) = $request['name'](validation name)
    $category->slug= Str::slug($data['slug']);
    $category->description= $reqeust['description'];

    if($reqeust ->hasfile('image')){

    $destination='upload/category/'.$category->image;

    if(File::exists($destination)){
        File::delete($destination);
    }

    $file=$reqeust->file('image');
    $filename=time(). "." .$file->getClientOriginalExtension();
    $file->move('upload/category/',$filename);
    $category->image=$filename;
    }

    $category->meta_title=$data['meta_title'];
    $category->meta_description=$data['meta_description'];
    $category->meta_keyword=$data['meta_keyword'];
    $category->navbar_status=$reqeust['navbar_status'] == true ? '1' : '0';
    $category->status=$reqeust['status'] == true ? '1' : '0';
    $category->created_by=Auth::user()->id;
    $category->update();

    return redirect('admin/categories')->with('messege','category Updated successfully');


   }

   public function destroy($category_id){

    $category=category::find($category_id);

    if($category){

        $destination='upload/category/'.$category->image;
        if(File::exists($destination)){
            File::delete($destination);
        }

        $category->postsdelete()->delete();

        $category->delete();

    return redirect('admin/categories')->with('status','Category and Posts Deleted successfully');

    }else{

    return redirect('admin/categories')->with('status','Id not found');

    }
   }

}
