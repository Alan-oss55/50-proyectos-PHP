<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Calculadora PHP básica</title>
        <link rel="stylesheet" href="style.css">
    </head>

        <body>
            <h1>Calculadora PHP básica</h1>

            <form action="calculadora.php" method="post">
 
                <div>
                    <input type="number" name="numero1" placeholder = "Númrero 1" required>

                    <input type="number" name="numero2" placeholder = "Númrero 2" required>

                    <select name="operacion" id="operacion">

                        <option value="suma">Suma</option>
                        <option value="resta">Resta</option>
                        <option value="multiplicacion">Multiplicacion</option>
                        <option value="division">División</option>

                    </select>

                    <button type="submit">Calcular</button>
                    
                </div>
            
            </form>



    <?php

        if ( $_SERVER["REQUEST_METHOD"] == "POST"){

            $resultado = 0 ;

            $numero1 = floatval( $_POST["numero1"] ) ;

            $numero2 = floatval( $_POST["numero2"] ) ;

            $operacion = $_POST["operacion"] ;

            switch ( $operacion ){

                case "suma" :
                    $resultado = $numero1 + $numero2 ;
                    break ; 

                case "resta" :
                    $resultado = $numero1 - $numero2 ;
                    break ; 
                
                case "multiplicacion" :
                    $resultado = $numero1 * $numero2 ;
                    break ; 

                case "division" :

                    if ( $numero2 != 0 ){

                        $resultado = $numero1 / $numero2 ;
                    }else{

                        $resultado = "Error! No se puede dividir por cero ." ;
                    }
                    break ; 
                
            }

            echo "<h3>Resultado: " . $resultado . "</h3>" ;

            
        }


    ?>

    </body>

</html>