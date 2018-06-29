<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Auth;
use Validator;
use App\Char;


class IndexController extends Controller
{
    public function index()
    {
        if(!Auth::check()){
            return view('guest');
        }

        $user = Auth::user();
        View::share('user',$user);

        $chars = Char::where('user_id', $user->id)->get();

        if(count($chars) == 0){
            return redirect('char/add');
        }
        return view('index');
    }

    public function charAdd()
    {
        return view('char.add');
    }

    public function charAddPost(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'char_name' => 'required|max:30',
            'char_id' => 'required|digits:12',
            'char_lv' => 'numeric',
            'char_team' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('char/add')
                        ->withErrors($validator)
                        ->withInput();
        }

        $user = Auth::user();
        
        $char = Char::create([
            'user_id' => $user->id,
            'char_name' => $req->input('char_name'),
            'char_id' => $req->input('char_id'),
            'char_lv' => $req->input('char_lv'),
            'char_team' => $req->input('char_team'),
        ]);

        return redirect('/');
    }
}
