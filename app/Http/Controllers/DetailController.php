<?php
namespace App\Http\Controllers {
    use App\Produkte;
    use App\Bilder;
    use App\Kommentare;
    use App\Zutaten;
    use App\Login;
    use Illuminate\Http\Request;
    class DetailController {
        public static function show(Request $request) {
            if(isset($request->ben) || isset($request->abmelden)) {
                Login::verify_login($request);
            }
            if(isset($request->bemerkung)) {
                Kommentare::updateOrCreate(['Bemerkung'=>$request->bemerkung,
                    'Bewertung'=>$request->bewertung,
                    'MID'=>$request->mid,
                    'Studischreibt'=>$request->benutzer
                ]);
            }
            $preis = Produkte::getPreisSpezif($request->mid);
            $detailMahl = Produkte::getMahlDataSpezif($request->mid);
            $bildMahl = Bilder::getBildData($request->mid);
            $zutatMahl = Zutaten::getZutatDataSpezif($request->mid);
            $kommentare = Kommentare::getKommentSpezif($request->mid);
            $durchschnitt = Kommentare::getDurchschnitt($request->mid);
            return view('Details',['detailMahl'=>$detailMahl,'bildMahl'=>$bildMahl,'zutatMahl'=>$zutatMahl, 'kommentare'=>$kommentare, 'preis'=>$preis, 'durchschnitt'=>$durchschnitt]);
        }
    }
}
