<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Generar frases aleatorias</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <style>

            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background-color: #e9ecef;
                color: #343a40;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
                box-sizing: border-box;
            }

            .container {

                background-color: #ffffffff;
                padding: 40px;
                border-radius: 12px ;
                box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
                text-align: center;
                width: 100%;
                max-width: 800px;
                transition: transform 0.3s ease-in-out;
            }

            .container:hover{

                transform: translateY(-5px);
            }

            h1 {
                font-size: 2.5em;
                color: #007bff;
                margin-bottom: 0.5em;
            }

            form {
                margin-bottom: 2em;
            }

            .form-group {

                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 15px;
            }

            label {
                font-size: 1.1em;
                font-weight: 600;
                color: #495057;
            }

            input[type="number"] {
                padding: 10px;
                font-size: 1em;
                border: 2px solid #ced4da;
                border-radius: 8px;
                width: 100%;
                max-width: 250px;
                text-align: center;
                transition: border-color 0.3s;
            }

            input[type="number"]:focus {
                outline: none;
                border-color: #007bff;
            }

            .btn-submit {

                background-color: #28a745;
                color: white;
                border: none;
                padding: 12px 24px;
                font-size: 1em;
                font-weight: bold;
                border-radius: 8px;
                cursor: pointer ;
                transition: background-color 0.3s;
            }

            .btn-submit:hover {
                background-color: #218838;
                transform: translateY(-2px);
            }

            .frase-container {
                margin-top: 2em;
                text-align: left;
            }

            .frase-item {
                background-color: #f8f9fa;
                border: 1px solid #dee2e6;
                border-left: 5px solid #007bff;
                padding: 15px;
                margin-bottom: 15px;
                border-radius: 8px;
                font-size: 1.2em;
                color: #495057;
                line-height: 1.5;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            }
        </style>
    </head>

    <body>

        <div class="container">
            <h1>Generar frases aleatorias</h1>

            <form action="" method="post">

                <div class="form-group">

                    <label for="cantidad">Cantidad de frases a generar </label>
                    <input type="number" name="cantidad" placeholder="Cantidad de frases" min="1" max="6" value="1" required>
                    <button type="submit" class="btn-submit">Generar Frases</button>
                </div>

            </form>

            <?php 
                if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {

                    $cantidad = intval( $_POST["cantidad"] ) ;

                    $frases = [

                        "La tecnología es la ciencia del futuro, y en Tech Solutions S.A. lo construimos hoy.",
                        "El único límite a nuestros logros de mañana es la duda de hoy.",
                        "Un gran poder conlleva una gran responsabilidad, especialmente en ciberseguridad.",
                        "La innovación distingue a un líder de sus seguidores.",
                        "Si puedes soñarlo, puedes programarlo. ¡Nosotros te ayudamos!",
                        "La programación es el arte de crear mundos con palabras y lógica.",

                    ] ;

                    $indice_aleatorio = array_rand( $frases, $cantidad ) ;

                    $frases_aleatorias = [] ;

                    if ( is_array( $indice_aleatorio ) ){

                        foreach ( $indice_aleatorio as $indice ){

                            $frases_aleatorias[] = $frases[$indice] ;
                        }
                    }else{

                        $frases_aleatorias[] = $frases[$indice_aleatorio] ;
                    }

                }
            ?>
            
            
                <?php

                    if ( !empty ($frases_aleatorias ) ){

                        echo '<div class="frase-container"> ' ;

                        foreach ( $frases_aleatorias as $frase ){
                            echo "<p class='frase-item'>" . htmlspecialchars( $frase ) . "</p>" ;
                        }

                        echo '</div>';
                    }
                
                ?>
            
        </div>
        

    </body>
</html>