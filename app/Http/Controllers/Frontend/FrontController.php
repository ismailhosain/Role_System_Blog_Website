<?php

namespace App\Http\Controllers\Frontend;

use App\Models\post;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function index()
    {
$catcarousel=category::where('status','0')->get();

$latestpost=post::where('status','0')->get();

        return view('frontend.index',compact('latestpost','catcarousel'));
    }

    public function viewcategorypost(string $category_slug)
    {

        $category=category::where('slug',$category_slug)->where('status','0')->first();  //eikhane first function er kaj hocce data return kora $category value te.

        //shorto hocce category model er slug column er value and url theke category_slug value equal hoy and status er value jodi 0 hoy then pore condition check hobe

        if($category){

             $post=post::where('category_id',$category->id)->where('status','0')->paginate(3);
             //shorto hocce post model er category_id column er value and eikhan theke $category er id value equal hoy and
            // status er value jodi 0 hoy then pore condition check hobe

            return view('frontend.post.index',compact('post','category'));

        }else{
                return redirect('/');
        }


    }

    public function viewpost(string $category_slug,string $post_slug)
    {
$category=category::where('slug',$category_slug)->where('status','0')->first();

//shorto hocce category model er slug column er value and url theke category_slug value equal hoy and status er value
//jodi 0 hoy then pore condition check hobe

if($category){

$post=post::where('category_id',$category->id)->where('status','0')->where('slug',$post_slug)->first();
//shorto hocce post model er category_id column er value and eikhan theke $category er id value equal hoy and
// status er value jodi 0 hoy then pore condition check hobe
$latest_posts=post::where('category_id',$category->id)->where('status','0')->orderBy('created_at','DESC')->get()->take(10);

return view('frontend.post.view',compact('post','latest_posts'));

}else{
return redirect('/');
}
    }
}
