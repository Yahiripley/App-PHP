<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CALCULADORA</title>
</head>
<body>
    
    <h1>CALCULADORA</h1>

    <p> Este es un view para la calculadora </p>
    <form action="/calculadora/sumar" method="post">
        <label>Numero 1</label>
        <input type="number" name="numero1">
        <br>
         <select name="operacion">
            <option value="sumar">sumar</option>
            <option value="restar">restar</option>
            <option value="multiplicar">multiplicar</option>
            <option value="dividir">dividir</option>
        </select>
        <br>
        <label>Numero 2</label>
        <input type="number" name="numero2">
        <br>
        <button type="submit">Calcular</button>

       
    </form>


</body>
</html>