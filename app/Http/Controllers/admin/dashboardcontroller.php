<?php

namespace App\Http\Controllers\admin;

use App\Models\post;
use App\Models\User;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class dashboardcontroller extends Controller
{
    public function index(){

        $countcategories=category::count();
        $countposts=post::count();
        $countadmin=User::where('role_as','1')->count();
        $countuser=User::where('role_as','0')->count();

        return view('admin.dashboard',compact('countcategories','countposts','countadmin','countuser'));
    }
}
