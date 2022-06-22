<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\StudyHoursPost;

class TestController extends Controller
{
    public function index(Request $request){
        $users = User::all();
        $posts = StudyHoursPost::all();
        return view('welcome', ['users' => $users, 'posts' =>$posts]);
    }
}
