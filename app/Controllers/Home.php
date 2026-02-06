<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {   
        return "Index de codeigniter 4";
        #return view('welcome_message');
    }

    public function saludar(): string
    {
        echo "HOLA PHP ";
        return "BIENVENIDO A SALUDAR";
    }

    public function saludar2($nombre="Mundo", $edad) {
        echo "HOLA $nombre, BIENVENIDO";
        echo "<br>";
        echo "Tu edad es: $edad años";
        echo "<br>";
        echo ($edad >= 18)? "Eres mayor de edad" : "Eres menor de edad";

    }


}
