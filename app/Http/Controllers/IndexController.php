<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Auth;
use Validator;
use DB;
use App\Char;


class IndexController extends Controller
{
    public function guest()
    {

    }

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

        $f_chars = DB::table('friends')->where('friends.user_id' , $user->id)
                        ->join('users' , 'friends.friend_user_id' , '=' , 'users.id')
                        ->join('chars' , 'friends.friend_user_id' , '=' , 'chars.user_id')
                        ->select()
                        ->get();

        return view('index',['f_chars' => $f_chars]);
    }

}
