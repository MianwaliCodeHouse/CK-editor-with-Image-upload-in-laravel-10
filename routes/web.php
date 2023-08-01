<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendMailController;
Route::get('/',function(){
    return view('createpost');
});
Route::get('/sendMail',[SendMailController::class,'index'])->name("sendMail");
Route::post('/upload',[SendMailController::class,'upload'])->name("ckeditor.upload");



