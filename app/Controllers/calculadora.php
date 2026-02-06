<?php

//carpeta donde se encuentra el archivo
namespace App\Controllers;

class Calculadora extends BaseController{
    public function index(){
        #HTML o texto
       // echo "<h1 style='color:blue;'>Calculadora</h1>";
       // echo "<p>Bienvenido a la calculadora</p>";

        #JSON APU
       // return json_encode(["Arturo", "Maria", "Roky"]);    
        
        #VISTA
        return view('calculadora');
}

public function sumar(){
    $numero1 = $_POST["numero1"];
    $numero2 = $_POST["numero2"];
    $resultado = $numero1 + $numero2;

    switch($_POST["operacion"]){
        case "sumar":
            $resultado = $numero1 + $numero2;
            break;
        case "restar":
            $resultado = $numero1 - $numero2;
            break;
        case "multiplicar":
            $resultado = $numero1 * $numero2;
            break;
        case "dividir":
            if($numero2 != 0){
                $resultado = $numero1 / $numero2;
            }else{
                echo "<h1 style='color:red;'>No se puede dividir entre cero</h1>";
                return;
            }
            break;
    }
    echo "<h1>El resultado de la operacion es: $resultado </h1>";
}
}