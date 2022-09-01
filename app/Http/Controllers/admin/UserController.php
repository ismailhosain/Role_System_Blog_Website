<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
public function index()
{

    $user=User::all();

    return view('admin.user.index',compact('user'));

}

public function edit($user_id)
{

    $user=User::find($user_id);

    return view('admin.user.edit',compact('user'));

}

public function update(Request $request,$user_id){

    $user=User::find($user_id);

    if($user){

        $user->role_as = $request->roles;

        $user->update();

            return redirect('admin/user')->with('messege','user role updated successfully');

    }
             return redirect('admin/user')->with('messege','User role not found');


}

}
