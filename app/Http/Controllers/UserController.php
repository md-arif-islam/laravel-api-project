<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
    public function generateToken( Request $request ) {
        $email = $request->username;
        $password = $request->password;
        if ( Auth::attempt( ['email' => $email, 'password' => $password] ) ) {
            return Auth::user();
        } else {
            return response()->json( ["error" => "credentials not match or user not found"], 404 );
        }
    }
}
