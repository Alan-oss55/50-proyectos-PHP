<?php 

    if ( isset($_POST["longitud"] ) ){

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
        }

        


    }
?>