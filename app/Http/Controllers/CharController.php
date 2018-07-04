<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Auth;
use Validator;
use DB;
use App\Char;

class CharController extends Controller
{
    public function list()
    {
        $user = Auth::user();
        View::share("user",$user);
        $chars = Char::where('user_id' , $user->id)->get();
        return view('char.list',['chars' => $chars]);
    }

    public function create()
    {
        View::share('user',Auth::user());
        return view('char.add');
    }

    public function store(Request $req)
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

        return redirect('char/list');
    }

    public function edit($id)
    {
        //Check $id is isset?
        $char = Char::find($id);
        
        //Check Char belong user
        $user = Auth::user();
        View::share("user",$user);
        if($char->user_id != $user->id){
            return redirect('char/list');
        }

        return view('char.edit',['char' => $char]);
    }

    public function update($id , Request $req)
    {
        $validator = Validator::make($req->all(), [
            'char_name' => 'required|max:30',
            'char_id' => 'required|digits:12',
            'char_lv' => 'numeric',
            'char_team' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('char/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();
        }

        //Check $id is isset?
        $char = Char::find($id);
        
        //Check Char belong user
        $user = Auth::user();
        View::share("user",$user);
        if($char->user_id != $user->id){
            return redirect('char/list')->with("error", "Action not allowed.");
        }
        $data = $req->all();
        $char->char_name = $data['char_name'];
        $char->char_id = $data['char_id'];
        $char->char_lv = $data['char_lv'];
        $char->char_team = $data['char_team'];
        $char->save();

        return redirect('char/list')->with('success' , '修改角色 '.$char->char_name.' 成功！');
    }

    public function delete(Request $req)
    {
        $id = $req->input('id');
        $user = Auth::user();
        $char = Char::find($id);
        if(!$char){
            return response()->json(['result' => 'error' , 'msg' => '刪除角色失敗']);
        }
        $char->delete();
        return response()->json(['result' => 'success' , 'msg' => '刪除角色 '.$char->char_name.' 成功！']);
    }
}
