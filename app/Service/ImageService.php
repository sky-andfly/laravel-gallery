<?php
namespace App\Service;

use Illuminate\Support\Facades\DB;

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
}
