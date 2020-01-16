<?php
namespace App\Http\Controllers {
    use App\Produkte;
    use App\Kategorien;
    use Illuminate\Http\Request;
    class ProduktController {
        public static function show(Request $request) {
            $mahlzeiten = array();
            $filter = array();
            if($request) {
                if($request->kat && $request->kat!=3) {
                    $filter['KatID'] = $request->kat;
                }
                if($request->avail) {
                    $filter['Verfügbar'] = $request->avail;
                }
                if($request->veggie) {
                    $filter['Vegetarisch'] =true;
                }
                if($request->vegan) {
                    $filter['Vegan'] =true;
                }
                $mahlzeiten = Produkte::filter($filter);
            } else {
                $mahlzeiten = Produkte::getData();
            }
            //$mahlzeiten = Produkte::get_data_relation();
            if(!isset($filter['KatID'])) {
                $filter['KatID'] = 3;
            }
            $kategorien = Kategorien::getData();
            return view("Produkte", ['mahlzeiten'=>$mahlzeiten,'kategorien'=>$kategorien, 'filter'=>$filter]);
        }
    }
}
