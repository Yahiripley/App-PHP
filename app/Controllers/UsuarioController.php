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
public function store() {
    $model = new UsuarioModel();

    // 1. Definimos las reglas de validación
    $reglas = [
        'nombre'     => 'required',
        'email'      => [
            'rules' => 'required|valid_email|is_unique[usuarios.email]',
            'errors' => [
                'is_unique' => 'El correo ya está registrado.',
                'valid_email' => 'El correo no es válido.'
            ]
        ],



        'contrasena' => [
            'label'  => 'Contraseña',
            'rules'  => 'required|min_length[8]|regex_match[/(?=.*[A-Z])(?=.*[0-9])/]',
            'errors' => [
                'regex_match' => 'La {field} debe tener al menos una mayúscula y un número.'
            ]
        ]
    ];

    // 2. Ejecutamos la validación
    if (!$this->validate($reglas)) {
        //return redirect()->back()->withInput()->with('msg', 'Error: Datos inválidos o incompletos.');
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // 3. Preparamos los datos (Ojo: quité los substr que recortaban el texto)
    $datos = [
        "nombre"   => $this->request->getPost("nombre"),
        "email"    => $this->request->getPost("email"),
        "password" => password_hash($this->request->getPost("contrasena"), PASSWORD_DEFAULT),
        "status"   => "activo"
    ];

    $model->insert($datos);
    return redirect()->to('/usuarios')->with('msg', 'Usuario creado exitosamente!');
}

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