<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('show', ['img' => $this->imageService->one($id)]);
    }
    public function edit($id){
        return view('edit', ['img' => $this->imageService->one($id)]);
    }
    public function delete($id){
        $this->imageService->delete($id);
        return redirect("/");
    }

    public  function update(Request $request, $id){
        $this->imageService->update($id, $request->file("img"));
        return redirect("/show/{$id}");
    }
    public function store(Request $request){
        $this->imageService->add($request->file('img'),  $request->input('text'));

        return redirect("/");
    }
}
