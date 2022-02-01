<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\UpdateAlegraIdRequest;

class AuthController extends Controller
{

  public function Login(Request $request)
  {
    if (Auth::attempt(['usuario' => $request->usuario, 'password' => $request->password])) {
      return redirect('/Menu');
    }

    return response()->json(array('mensaje' => "'Lo sentimos: no hemos identificado su usuario o contraseña en nuestros registros!"), 404);
  }

  public function Logout()
  {
    Auth::logout();

    if (!Auth::user()) {
      return redirect('/');
    }
  }
}
