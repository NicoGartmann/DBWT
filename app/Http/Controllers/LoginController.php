<?php
namespace App\Http\Controllers {
    use App\Login;
    use Illuminate\Http\Request;
    class LoginController {
        public static function show(Request $request) {
            Login::verify_login($request);
            return view('Login');
        }
    }
}
