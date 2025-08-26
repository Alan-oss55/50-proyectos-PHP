<?php 

    session_start() ;

    require("connection.php") ;

    if ( $_SERVER["REQUEST_METHOD"] == "POST" ){

        $username = $_POST["username"] ;
        $password = $_POST["password"] ;

        $sent_base = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";
        
        $resultado = $conexion_bd->query($sent_base);

        $usuario = $resultado->fetch_assoc() ;

        if ( $usuario ) {

            $_SESSION["id_usuario"] = $usuario["id"] ;
            header("Location: inicio.php") ;
            exit;
        }else{
            echo "Usuario o contraseña incorrectos" ;
        }
    }


?>



<!DOCTYPE html>
<html lang="es">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <style>

        </style>
    </head>
    <body>

        <div class="container">
            <h1>Mi cuenta</h1>

            <div class="form-group">
                <form action="" method="post">
                    <label for="username">username</label>
                    <input type="text" name="username" id="username" required>

                    <label for="password">Passwod</label>
                    <input type="text" name="password" id="password" required>

                    <button type="submit">Login</button>
                </form>
            </div>
        </div>
        
    </body>

</html>