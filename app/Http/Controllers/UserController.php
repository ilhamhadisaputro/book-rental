<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function profile() {
        return view('profile');
    }
    public function index() 
    {
        $username = User::where('role_id', 2)->get()->where('status', 'active');
        return view('user', ['username' =>$username]);
    }

    public function registeredUsers() 
    {
        $registeredUsers = User::where('status', 'inactive')->get()->where('role_id', 2);
        return view('registered_users' , ['registeredUsers' => $registeredUsers]);
    }

    public function show($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('user_detail', ['user' => $user]);
    }

    public function approve($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->status = "active";
        $user->save();
        return redirect('user_detail/'. $slug)->with('status', 'User Approved Successfully');
    }

    public function delete($slug)
    {
        $username = User::where('slug', $slug)->first();
        return view('user_delete', ['username' => $username]);
        
    }

    public function destroy($slug)
    {
        $username = User::where('slug', $slug)->first();
        $username->delete();
        return redirect('user')->with('status', 'User Delete Successfully');
    }

    public function banned_user()
    {
        $bannedUser = User::onlyTrashed()->get();
        return view('user_banned', ['bannedUser' => $bannedUser]);
    }

    public function restore($slug)
    {
        $username = User::withTrashed()->where('slug', $slug)->first();
        $username->restore();

        return redirect('user')->with('status', 'User Restore Successfully');
    }
}