<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lector de Archivos .txt</title>

        <style>
            body {
                font-family: Arial, Helvetica, sans-serif;
                background-color: #ffffffff;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }

            .container {
                background-color: #e2e2e2ff;
                padding: 40px;
                text-align: center;
                border-radius: 8px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
                width: 400px;
                text-align: center;
            }

            h1 {
                color: #333;
                margin-bottom: 20px;
            }

            .form-group {

                margin-bottom: 20px;
                text-align: center;
            }

            label {

                display: block;
                margin-bottom: 8px;
                font-weight: bold;
            }
        </style>
    </head>

    <body>
        

        <div class="container">

            <h1>Lector de Archivos .txt</h1>

            <form action="" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="archivo">Importar Archivo .txt:</label>
                    <input type="file" name="archivo" id="archivo" >
                    <input type="submit" value="Leer archivo">
                </div>
            </form>
        </div>

        <?php 

            if ( $_FILES["archivo"] && $_FILES["archivo"]["error"] === UPLOAD_ERR_OK ){

                $tmp_name = $_FILES["archivo"]["tmp_name"];

                $type_archiv = $_FILES["archivo"]["type"];

                if ( $type_archiv == "text/plain" ){

                    //leemos el contenido del archivo
                    $content = file_get_contents($tmp_name) ;

                    echo "<h2>Contenido del archivo</h2>" ;
                    
                    echo "<pre>" . htmlspecialchars( $content ) . "</pre>" ;


                }else{

                    echo "<h2>Error: Por favor sube un archivo (.txt)</h2>" ;
                }

            }else if ( isset ( $_FILES["archivo"] ) && $_FILES["archivo"]["error"] != UPLOAD_ERR_NO_FILE ){

                 echo "<h2>Error: Ocurrió un error al subir el archivo</h2>" ;
            }
        ?>
    </body>
</html>