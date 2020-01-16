<?php
namespace App {
    use App\Benutzer;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Session;
    class Login {
        /**
         * Verarbeitet das Login/Logout und aktualisiert DB
         * @param $request
         */
        public static function verify_login($request) {
            Session::start();
            if($request->ben) {
                $benutzer = Benutzer::where('Nutzername', $request->ben)->first();
                $rolle = DB::table('Nutzerrolle')
                    ->select('Rolle')
                    ->where('Nummer', $benutzer->Nummer)
                    ->first();
                if($benutzer) {
                    if (password_verify($request->pas, $benutzer->Hash)) {
                        DB::table('Benutzer')
                            ->where('Nummer',$benutzer->Nummer)
                            ->update(['Letzter Login'=>now(), 'Aktiv'=>true]);
                        Session::put('BenID', $benutzer->Nummer);
                        Session::put('angemeldet', true);
                        Session::put('Nutzername', $benutzer->Nutzername);
                        Session::put('Rolle', $rolle->Rolle);
                    }
                }
            } else {
                DB::table('Benutzer')
                    ->where('Nummer', Session::get('BenID'))
                    ->update(['Aktiv'=> false]);
                Session::flush();
            }
        }
    }
}
