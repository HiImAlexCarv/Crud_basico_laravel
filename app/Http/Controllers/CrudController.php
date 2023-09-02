<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class CrudController extends Controller
{
    public function index(){
        $datos=DB::select(" select* from personal ");

        return view("welcome")->with("datos",$datos);
    }

    public function create(Request $request){
        try {
            $sql =DB::insert("insert into personal(nombre,ciudad)values(?,?) ",[
                $request->txtnombre,
                $request->txtciudad
               ]);
        } catch (\Throwable $th) {
            $sql = 0;
        }

       if ($sql == true) {
        return back()->with("correcto","Personal registrado correctamente");
       }else {
        return back()->with("error","no se pudo registrar");
       }

    }

    public function update(Request $request){
        try {
            $sql =DB::update (" update personal set nombre=?, ciudad=? where id=? " ,[
                $request->txtnombre,
                $request->txtciudad,
                $request->txtid,
            ]);

            if ($sql == 0) {
                $sql = 1;
            }
        } catch (\Throwable $th) {
            $sql = 0;
        }

        if ($sql == true) {
            return back()->with("correcto","Personal modificado correctamente");
           }else {
            return back()->with("error","no se pudo modificar");
           }

    }

    public function delete($id){
        try {
            $sql =DB::delete (" delete from personal where id=$id ");

        } catch (\Throwable $th) {
            $sql = 0;
        }

        if ($sql == true) {
            return back()->with("correcto","Personal eliminado correctamente");
           }else {
            return back()->with("error","no se pudo eliminar");
           }

    }
}
