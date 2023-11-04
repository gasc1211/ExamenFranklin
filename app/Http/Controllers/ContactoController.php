<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Directorio;
use App\Models\Contacto;

class ContactoController extends Controller
{
    //
    function crear($codigo) {
        return view("agregarcontacto", compact("codigo"));
    }

    function guardar(Request $request) {
        $contacto = new Contacto();

        $contacto->codigoEntrada = $request->input("codigo");
        $contacto->nombre = $request->input("nombre");
        $contacto->apellido = $request->input("apellido");
        $contacto->telefono = $request->input("telefono");

        $contacto->save();

        $directorio = Directorio::find($request->input("codigo"));

        $contactos = Contacto::all()->where("codigoEntrada", $directorio->codigoEntrada);

        return view("vercontactos", compact("directorio", "contactos"));
    }

    function eliminar($id) {
        $contacto = Contacto::find($id);

        $contacto->delete();

        $directorios = Directorio::all();

        return view('directorio', compact("directorios"));
    }
}
