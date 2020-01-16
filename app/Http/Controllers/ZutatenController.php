<?php
namespace App\Http\Controllers {
    use App\Zutaten;
    class ZutatenController {
        public static function show() {
            $zutaten = Zutaten::getAllData();
            return view('Zutaten',['zutaten'=>$zutaten]);
        }
    }
}
