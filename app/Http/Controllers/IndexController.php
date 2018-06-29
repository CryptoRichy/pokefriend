<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Auth;


class IndexController extends Controller
{
    public function index()
    {
        if(!Auth::check()){
            return view('guest');
        }

        $user = Auth::user();
        View::share('user',$user);

        return view('index');
    }
}
