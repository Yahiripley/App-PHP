<?php

/*
Modelo: Se conecta a la tabla de la base de datos

Controlador: logica de programacion (CRUD)
             y salida de datos(imprimir, view html, json, redireccion)

Routes: indicamos que url va a acceder a que funcion de que controlador

Views: Plantilla html o php con un diseño preestablecido listo para usar

*/ 

namespace App\Controllers;

use CodeIgniter\Controller; 
use App\Models\UsuarioModel;

class UsuarioController extends  BaseController{

#GET Mostrar usuarios (VIEW)
# route:  /
public function index(){
    $model = new UsuarioModel();

    $usuarios =  $model->findAll();
    
    $data = array("usuarios" => $usuarios);
    return view("usuarios/usuario_index",$data);

}


#GET Mostar usuario {id} (VIEW)
#/(:num) 
public function show($id)
    {
        $model = new UsuarioModel();
        $usuario = $model->find($id);

        $data = array("usuario" => $usuario);

return view("usuarios/usuarios_show",$data);

        if ($usuario) {
            echo "Nombre: $usuario[nombre] <br>";
            echo "Email:  $usuario[email] <br>" ;
            echo "id:  $usuario[id]<br>" ; 
            echo "Status:  $usuario[status] <br>" ;
        } else {
            echo "Usuario no encontrado.";
        }
    }

#GET mostrar formulario para agregar usuario (VIEW)
#/create 

public function create(){
    return view("usuarios/usuarios_create");
}

#POST accion: crear usuario  (redicrecciona -> usuarios/{id})
#/store 

#GET Mostrar formulario para editar usuario {id} (VIEW)
#/edit/(:num) 

#POST Accion: actualizar info del usuario {id} en la base de datos (Redireccion -> /usuarios)
#/update/(:num) 

#POST accion: eliminar usuario {id}
#/delete/(:num) 

public function delete($id){
    $model = new UsuarioModel();
    $model->delete($id);
    return redirect()->to('/usuarios')->with('msg', 'Usuario $id eliminado!');
}

#GET mostrar login
#/login

#post accion: validar login
#/login/auth 

#post accion: logout
#/logout










}