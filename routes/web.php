<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $images = DB::table('images')
        ->select('*')
        ->get();

    $data = [
        'images' => $images->all(),
    ];
    return view('welcome', $data);
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/add', function () {
    return view('add');
});
Route::get("/show/{id}", function($id){
    $img = DB::table('images')->select('*')->where('id', $id)->first();
    return view('show', ['img' => $img]);
});
Route::get("edit/{id}", function($id){
    $img = DB::table('images')->select('*')->where('id', $id)->first();
    return view('edit', ['img' => $img]);
});


//post
Route::post("/update/{id}", function (\Illuminate\Http\Request $request, $id){
    $delete_img = DB::table('images')->select('image')->where('id', $id)->first()->image;

    \Illuminate\Support\Facades\Storage::delete($delete_img);
    $images = $request->file('img')->store("uploads");
    DB::table('images')
        ->where('id', $id)
        ->update(['image' => $images]);
    return redirect("/show/{$id}");
});

Route::post('/store', function(\Illuminate\Http\Request $request){

   $images = $request->file('img')->store("uploads");

    DB::table('images')->insert([
        'image' => $images,
        'text' => $request->input('text')
    ]);
    return redirect("/");
});
