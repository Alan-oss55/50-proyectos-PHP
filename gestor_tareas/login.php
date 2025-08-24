<?php 

    session_start() ;

    require("connection.php") ;

    if ( $_SERVER["REQUEST_METHOD"] == "POST" ){

        $username = $_POST["username"] ;
        $password = $_POST["password"] ;

        $sent_base = "SELECT * FROM usuarios WHERE username = ? " ;

        $stmt = $conexion_bd->prepare($sent_base) ;

        $stmt->bind_param("s", $username) ;

        $stmt->execute() ;

        $resultado = $stmt->get_result() ;

        $usuario = $resultado->fetch_assoc() ;

        $stmt->close() ;

        if ( $usuario && password_verify($password, $usuario["password"] ) ) {

            $_SESSION["id_usuario"] = $usuario["id"] ;
            header("Location: inicio.php") ;
            exit;
        }else{
            echo "Usuario o contraseña incorrectos" ;
        }
    }


?>



<!DOCTYPE html>
<html>
    <head>
        <style>

        </style>
    </head>
    <body>
        
    </body>

</html>