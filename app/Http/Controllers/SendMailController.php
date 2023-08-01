<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendMailController extends Controller
{
    public function index(){
        $mailData=[
            'title'=>'MianwaliCodeHouse',
            'body'=>'This mail is for testing purpose!!!'
        ];
        Mail::to('yasirhusain250@gmail.com')->send(new SendMail($mailData));
        echo "<h1>Email send successfully!!!";
    }

    public function upload(Request $r){
        if($r->hasFile('upload')){
            $o_name=$r->file('upload')->getClientOriginalName();
            $new_name=time().'_'.$o_name;
            $r->file('upload')->move(public_path('uploads'),$new_name);

            $url=asset('uploads/'.$new_name);

            return response()->json(['fileName'=>$new_name,'uploaded'=>1,'url'=>$url]);
        }
        
    }
}
