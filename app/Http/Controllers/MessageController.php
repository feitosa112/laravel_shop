<?php

namespace App\Http\Controllers;

use App\Models\MessageModel;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;


class MessageController extends Controller
{
    public function sendMsg(HttpRequest $request,$id){
        // dd($id);
        $request->validate([
            'msg'=>'required'
        ]);
        MessageModel::create([
            'message'=>$request->input('msg'),
            'user_id'=>Auth::user()->id,
            'product_id'=>$id
        ]);
        return redirect()->back()->with('sendMsg','Uspjesno ste poslali poruku');
    }
}
