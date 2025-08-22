<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lector de Archivos .txt</title>

        <style>
            body {
                font-family: Arial, Helvetica, sans-serif;
                background-color: #f0f3f6;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
                color: #333;
            }

            .main-container {
                background-color: #fff;
                padding: 40px;
                border-radius: 8px;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
                width: 500px;
                text-align: center;
            }

            .drop-zone {

                border: 2px dashed #b5c3d4;
                background-color: #f7f9fc;
                padding: 50px 20px;
                margin-top: 20px;
                border-radius: 8px;
                position: relative;
            }

            .drop-zone h3 {

                margin-top: 0;
                color: #555;
                
            }

            .drop-zone p {
                color: #888;
            }

            .file-input {
                opacity: 0;
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                cursor: pointer;
            }

            .custom-button {
                display: inline-block;
                background-color: #007bff;
                color: #fff;
                padding: 12px 25px;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s ;
            }

            .custom-button:hover {
                background-color: #0056b3;
            }

            .content-ouput {
                margin-top: 30px;
                text-align: left;
                width: 500px;
            }

            .content-ouput {
                margin-top:30px;
                text-align: center;
                width: 500px;
            }

            .content-ouput pre {

                background-color: #e9ecef;
                padding: 20px;
                border-radius: 5px;
                white-space: pre-wrap;
                word-wrap: break-word;
                border: 1px solid #ced4da;
                max-height: 400px;
                overflow-y: auto;
            }

            .error-message {
                color: #dc3545;
                text-align: center;
                margin-top: 20px;
            }


        </style>
    </head>

    <body>
        

        <div class="main-container">

            <h1>Lector de Archivos .txt</h1>

            <form action="" method="post" enctype="multipart/form-data">

                <div class="drop-zone">
                    <h3>Elige un archivo o arrástralo aquí</h3>
                    <label for="archivo" class="custom-button">ELEGIR ARCHIVOS</label>
                    <input type="file" name="archivo" id="archivo" class="file-input" onchange="this.form.submit()">
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
                    echo "<div class='content-ouput'>" ;
                    echo "<h2>Contenido del archivo</h2>" ;
                    
                    echo "<pre>" . htmlspecialchars( $content ) . "</pre>" ;

                    echo "</div>" ;

                }else{
                    echo "<div class='content-ouput error-message'>" ;
                    echo "<h2>Error: Por favor sube un archivo (.txt)</h2>" ;
                    echo "</div>" ;
                }

            }else if ( isset ( $_FILES["archivo"] ) && $_FILES["archivo"]["error"] != UPLOAD_ERR_NO_FILE ){

                echo "<div class='content-ouput error-message'>" ;
                echo "<h2>Error: Ocurrió un error al subir el archivo</h2>" ;
                echo "</div>" ;
            }
        ?>
    </body>
</html>