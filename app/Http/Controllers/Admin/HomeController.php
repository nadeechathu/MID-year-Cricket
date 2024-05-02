<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\UserSubscription;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       

        $totalUsers = User::count();
        $totalPosts = Post::count();
        $totalPostsToApprove = Post::where('is_approved',0)->count();

        return view('admin.dashboard',compact('totalUsers','totalPosts','totalPostsToApprove'));
    }
}
