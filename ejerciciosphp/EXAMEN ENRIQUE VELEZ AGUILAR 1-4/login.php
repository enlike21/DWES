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
            <label>Email:</label>
            <p><input type="email" name="email"></p>
            <label>Contraseña:</label>
            <p><input type="password" name="contraseña"></p>
            <input type="submit" value="Log in"></input>
        </fieldset>
    </form>
    <?php
    //COMPRUEBO SI LOS INPUTS TIENEN VALOR
        if(isset($_POST["email"])&& isset($_POST["contraseña"])){
            session_start();
            $email=$_POST["email"];
            $contraseña=$_POST["contraseña"];
            //SI LA CONTRASEÑA ES IGUAL A LO QUE NOS PIDE, HAGO UNA SESION Y MANDO AL USUARIO A OTRA PAGINA
            if($email=="usuario@gmail.com"&& $contraseña=="1234"){
                $datos=["nombre"=>$email,"password"=>$contraseña];
                $_SESSION["usuario"][]=$datos;
                header("location:portal.php");
                exit();
            }
            else{ //SI NO, SALTA UN MENSAJE Y CREO UNA COOKIE DE 10 SEGUNDOS DONDE SE GUARDA EL VALOR DEL EMAIL
                echo "Log in incorrecto";
                setcookie("error",$email,time()+10);
            }
        }
    
    ?>
</body>
</html>