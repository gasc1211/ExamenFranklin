<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Directorio;
use App\Models\Contacto;

class DirectorioController extends Controller
{
    //
    function index() {
        $directorios = Directorio::all();

        return view('directorio', compact("directorios"));
    }

    function crear() {
        return view("crearEntrada");
    }

    function buscar() {
        return view("buscar");
    }

    function verContactos($id) {
        $directorio = Directorio::find($id);

        $contactos = Contacto::all()->where("codigoEntrada", $directorio->codigoEntrada);

        return view("vercontactos", compact("directorio", "contactos"));
    }

    function eliminar($id) {
        $directorio = Directorio::find($id);

        return view("eliminar", compact("directorio"));
    }

    function crearEntrada(Request $request) {
        $directorio = new Directorio();
        
        $directorio->codigoEntrada = $request->input("codigo");
        $directorio->nombre = $request->input("nombre");
        $directorio->apellido = $request->input("apellido");
        $directorio->correo = $request->input("correo");
        $directorio->telefono = $request->input("telefono");

        $directorio->save();

        $directorios = Directorio::all();

        return view('directorio', compact("directorios"));
    }

    function buscarDir(Request $request) {
        $directorio = Directorio::where("correo", $request->input("correo"));
    }

    function destroy($id) {
        $contactos = Contacto::all()->where("codigoEntrada", $id);

        foreach ($contactos as $key) {
            $key->delete();
        }

        $directorio = Directorio::find($id);

        $directorio->delete();

        $directorios = Directorio::all();

        return view('directorio', compact("directorios"));
    }
}
