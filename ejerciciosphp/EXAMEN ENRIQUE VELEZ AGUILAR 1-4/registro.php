<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <fieldset>
            <label for="email">Email:</label>
            <p><input type="text" name="email"></p>
            <label for="nombre">Nombre:</label>
            <p><input type="text" name="nombre"></p>
            <label for="edad">Edad:</label>
            <p><input type="number" name="edad"></p>
            <label for="contraseña">Contraseña:</label>
            <p><input type="password" name="contraseña"></p>
            <label for="confirmar_contraseña">Confirmar contraseña:</label>
            <p><input type="password" name="confirmar_contraseña"></p>
            <input type="submit" value="Sign in"></input>
        </fieldset>
    </form>
    <?php

//COMPRUEBO SI TIENEN VALOR LOS INPUTS
    if(isset($_POST["email"]) && isset($_POST["edad"])){

        //RECOJO LOS VALORES
    $email=$_POST["email"];
    $nombre=$_POST["nombre"];
    $edad=$_POST["edad"];
    $contraseña=$_POST["contraseña"];
    $valido=true;

//COMPRUEBO PATRONES
    if(preg_match("/@*.com$/",$email)){
        echo "El email es correcto <br>";
    }
    else{
        echo "El email es incorrecto <br>";
        $valido=false;
    }

    if(preg_match("/[1-6][0-9]/",$edad)){
        echo "Edad aceptada <br>";
    } 
    else{
        echo "Edad incorrecta <br>";
        $valido=false;
    }
    
    //SI ES VALIDO, ESCRIBO EN EL ARCHIVO DE TEXTO
    if($valido){
        $fichero=fopen( "usuarios.txt", "w" );
        fwrite($fichero,"$email,$nombre,$edad,$contraseña");
        fclose($fichero);
    }
    else{
        echo "El email o la contraseña eran incorrectas por lo que no se puedo escrbir en el archivo de texto <br>";
    }
    }
    ?>
</body>
</html>