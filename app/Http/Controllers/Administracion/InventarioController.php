<?php

namespace App\Http\Controllers\Administracion;


use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\InventarioGeneral;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\UpdateAlegraIdRequest;

class InventarioController extends Controller
{
  public function GetInventario()
  {
    $inventario = InventarioGeneral::all();
    return response()->json($inventario);
  }

  public function SaveMaterialToInventario(Request $request)
  {
    $material = InventarioGeneral::create($request->all());
    if ($material) {
      return response()->json(["mensaje"=>"se guardo la información del material con éxito."],200);
    }
    return response()->json(["mensaje"=>"ocurrió un error al intentar guardar la información del material"],400);
  }
  
  
  public function SaveEditMaterial(Request $request)
  {
    $request->offsetUnset("updated_at");
    $request->offsetUnset("created_at");
    $material = InventarioGeneral::where("id", $request->id)->update($request->all());
    if ($material) {
      return response()->json(["mensaje"=>"se actualizo la información del material con éxito."],200);
    }
    return response()->json(["mensaje"=>"ocurrió un error al intentar actualizar la información del material"],400);
  }

  public function DeleteMaterial($materialId)
  {
    $material = InventarioGeneral::where("id", $materialId)->delete();
    if ($material) {
      return response()->json(["mensaje"=>"se elimino el material con éxito."],200);
    }
    return response()->json(["mensaje"=>"ocurrió un error al intentar eliminar el material"],400);
  }
}
