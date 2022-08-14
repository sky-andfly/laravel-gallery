<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
    public function index() {
    $images = DB::table('images')
        ->select('*')
        ->get();

    $data = [
        'images' => $images->all(),
    ];
    return view('welcome', $data);
}
    public function add() {
        return view('add');
    }

    public function show($id){
        $img = DB::table('images')->select('*')->where('id', $id)->first();
        return view('show', ['img' => $img]);
    }
    public function edit($id){
        $img = DB::table('images')->select('*')->where('id', $id)->first();
        return view('edit', ['img' => $img]);
    }
    public function delete($id){
        $delete_img = DB::table('images')->select('image')->where('id', $id)->first()->image;
        Storage::delete($delete_img);
        DB::table('images')->delete($id);
        return redirect("/");
    }

    public  function update(Request $request, $id){
        $delete_img = DB::table('images')->select('image')->where('id', $id)->first()->image;

        Storage::delete($delete_img);
        $images = $request->file('img')->store("uploads");
        DB::table('images')
            ->where('id', $id)
            ->update(['image' => $images]);
        return redirect("/show/{$id}");
    }
    public function store(Request $request){

        $images = $request->file('img')->store("uploads");

        DB::table('images')->insert([
            'image' => $images,
            'text' => $request->input('text')
        ]);
        return redirect("/");
    }
}
