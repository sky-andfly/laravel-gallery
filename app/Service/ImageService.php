<?php
namespace App\Service;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageService{
    public function get_all_images(){
        $images = DB::table('images')
            ->select('*')
            ->get();
        return $images->all();
    }
    public function add($images, $text){


        DB::table('images')->insert([
            'image' => $images->store("uploads"),
            'text' => $text
        ]);
    }
    public function one($id){
        return  DB::table('images')->select('*')->where('id', $id)->first();
    }
    public function delete($id){
        $delete_img = $this->one($id)->image;
        Storage::delete($delete_img);
        DB::table('images')->delete($id);
    }

    public function update($id, $file){
        $delete_img = $this->one($id)->image;


        Storage::delete($delete_img);
        $images = $file->store("uploads");
        DB::table('images')
            ->where('id', $id)
            ->update(['image' => $images]);
    }
}
