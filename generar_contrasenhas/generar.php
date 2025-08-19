<?php 

    if ( isset( $_SERVER["REQUEST_METHOD"] ) && $_SERVER["REQUEST_METHOD"] == "POST"){

        $longitud = 0 ;
        $max_caracteres = 0 ;
        $caracteres = '' ;

        if ( isset( $_POST["mayusculas"] ) ){

            $caracteres .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ" ;
        }

        if ( isset( $_POST["minusculas"] ) ){

            $caracteres .= "abcdefghijklmnopqrstuvwxyz"  ;
        }

        if ( isset( $_POST["simbolos"] ) ){

            $caracteres .= "!@#$%^&*-" ;
        }

        if ( isset( $_POST["numeros"] ) ){

            $caracteres .= "0123456789" ;
        }


        if ( empty( $caracteres ) ) {

            echo "Error, debe seleccionar al menos un tipo de caracter." ;
            exit ;
        }

        
        $longitud = $_POST["longitud"] ;

        if ( $longitud < 6 || $longitud > 36 ) { $longitud = 12 ; }

        $contraseña = '' ;

        $max_caracteres = strlen( $caracteres ) - 1 ;

        for ( $i = 0 ; $i < $longitud ; $i++ ) {

            $contraseña .= $caracteres[random_int(0, $max_caracteres) ] ;
        }

        echo "<h1>Contraseña generada:</h1> " ;

        echo "<h3> " . htmlspecialchars( $contraseña ) ."</h3>" ;

        echo "<a href='index.html'> Generar otra contraseña </a>" ;


    }
?>