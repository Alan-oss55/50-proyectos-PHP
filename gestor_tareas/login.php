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

            body {

                font-family: Arial, Helvetica, sans-serif;
                background-color: #2284c5ff ;
                color: #ffffffff;
                height: 100vh;
                margin: 0;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .container {
                background-color: #59a3d4ff;
                padding: 40px;
                width: 90% ;
                max-width: 400px;
                border-radius: 8px;
                text-align: center;
                box-shadow: 0 4px 15px rgba(255, 255, 255, 0.1);
            }

            h1{
                margin-bottom: 20px;
                font-size: 24px;
                font-weight: bold;
                color: #fff;
            }

            form {
                display: flex;
                flex-direction: column;
                gap:15px;
            }


            input[type="text"], input[type="password"]{

                width: 100%;
                padding: 12px;
                border-radius: 5px;
                border: none;
                font-size: 16px;
                background-color: rgba(255, 255, 255, 0.9);
                color: #333;
                text-align: center;
                box-sizing: border-box;
            }

            button.btn-submit {

                border: none;
                border-radius: 5px;
                padding: 12px;
                font-size: 16px;
                background-color:  #2c7bafff;
                color: #fff;
                font-weight: bold;
                cursor: pointer;
                margin-top: 10px;
                transition: background-color 0.3s ease;
            }

            button.btn-submit:hover {
                background-color: #1c72acff ;
            }

        </style>
    </head>
    <body>

        <div class="container">
            <h1>Bienvenido</h1>

            <div class="form-group">

                <form action="" method="post">

                        <input type="text" placeholder="Username" name="username" id="username" required>
                    
                        <input type="password" placeholder="Password" name="password" id="password" required>

                        <button type="submit" class="btn-submit">Login</button>

                </form>
            </div>
        </div>
        
    </body>

</html>