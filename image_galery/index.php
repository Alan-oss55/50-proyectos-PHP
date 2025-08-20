<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Galería de Imagenes</title>
        <style>
            body {
                font-family: 'Segoe UI', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background-color: #f4f7f6;
                color: #333;
                padding: 40px;
                text-align: center;
                margin: 0;
            }

            h1 {
                color: #2c3e50;
                margin-bottom: 30px;
                font-size: 2.5em;
                font-weight: bold;
            }   

            .galery-container {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 30px;
                max-width: 1200px;
                margin: 30px auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 12px;
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            }

            .galery-item {
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
                overflow: hidden;
                position: relative;
                transition: transform 0.3s ease-in-out;
            }

            .galery-item:hover {

                transform: scale(1.05);
                box-shadow: 0 12px 20px rgba(0, 0, 0, 0.12);
            }

            .galery-item img {
                width: 100%;
                height: 650px;
                object-fit: cover;
                display: block;
                border-radius: 8px;
            }


            .overlay {

                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                display: flex;
                justify-content: center;
                align-items: center;
                opacity: 0;
                transition: opacity 0.3s ease-in-out;
                border-radius: 8px;
            }

            .galery-item:hover .overlay {
                opacity: 1;
            }

            .overlay-text {
                color: #fff;
                font-size: 1.2em;
                font-weight: bold;
            }

        </style>
    </head>

    <body>
        <h1>Mi Galería de Imagenes</h1>
        <div class="gallery-container">
            <?php 
                $image_directory = 'images/' ;

                $allowed_extensions = array('jpg', 'png', 'gif', 'jpeg') ;

                $files = scandir($image_directory) ;

                foreach( $files as $file ){
                    
                    $file_info = pathinfo($file) ;

                    if ( isset ( $file_info['extension'] ) && in_array( strtolower( $file_info['extension'] ), $allowed_extensions ) ){

                        echo "<div class='galery-item'>" ;
                            
                            echo "<img src='" . htmlspecialchars($image_directory . $file ) . "' alt='Imagen de la galería'>" ;

                            echo "<div class='overlay'>" ;
                                echo "<span class='file-name'>" . htmlspecialchars($file_info['filename' ] ) . "</span>" ;
                            echo "</div>" ;
                        echo "</div>" ;
                    }
                }
            ?>
        </div>
    </body>
</html>