<?php

/*
Modelo: se conecta a la tabla de la base de datos

Controlador: Logica de programacion (CRUD) y salida de datos (Imprimir, cargar vista, json, redireccion)

Routes: Indicamos que url va a acceder a que funcion de que controlador

Views: Plantilla html o php con un diseño preestablecido listo para usar
*/
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;

class UsuarioController extends BaseController{

public function index(){
        $model = new UsuarioModel();
        $usuarios = $model->findAll();
        foreach($usuarios as $u){
            echo "$u[nombre] <b> ($u[id]) </b><br>";


        }
        }
public function show($id){
    $model = new UsuarioModel();
    $usuario = $model->find($id);

    if($usuario){
    echo "$usuario[nombre] <br>";
    echo "$usuario[email] <br>";
    echo "$usuario[correo] <br>";
    echo "id: $usuario[id] <br>";
    echo "$usuario[status] <br>";
    }else{
        echo "Usuario no encontrado";
    }
}
public function delete(){
    $model = new UsuarioModel();
    $model->delete($id);
    return redirect()->to('/usuarios')->with('mensaje', "Usuario $id eliminado");




}
public function create(){
    return view('usuarios/create');




}
}