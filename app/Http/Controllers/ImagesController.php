<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Service\ImageService;
class ImagesController extends Controller
{
    private $imageService;
    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function index() {

    return view('welcome', ['images' => $this->imageService->get_all_images()]);
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
        $this->imageService->add($request->file('img'),  $request->input('text'));

        return redirect("/");
    }
}
