<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
        return view('home');
    }
    public function admin()
    {
        if(Gate::allows('admin-only',auth()->user())){
           $user= User::where('role', '=',2)->get();
           $task=["education", "recreational", "social", "diy", "charity", "cooking", "relaxation", "music", "busywork"];
        return view('admin',compact('user','task'));   
        }
        else{
            
            $tasks= auth()->user()->tasks;
            return view('home',compact('tasks'));  
        }
    }

}
