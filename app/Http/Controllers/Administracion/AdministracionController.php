<?php

namespace App\Http\Controllers\Administracion;


use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\UpdateAlegraIdRequest;

class AdministracionController extends Controller
{
  public function AdministracionHome()
  {
    return view('administracion.home');
  }

  public function Inventario()
  {
    return view('administracion.inventario');
  }

}
