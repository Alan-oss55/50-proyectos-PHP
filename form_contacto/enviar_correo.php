<?php 

    if ( $_SERVER["REQUEST_METHOD"] == "POST"){

        $nombre = htmlspecialchars( $_POST["nombre"] ) ;
        $correo = htmlspecialchars( $_POST["correo"] ) ;
        $mensaje = htmlspecialchars( $_POST["mensaje"] ) ;


        if ( empty( $nombre ) || empty( $correo ) || empty( $mensaje ) ){

            echo "Error: Todos los campos son obligatorios." ;

            exit ;

        }

        $destinatario = "alanq5038@gmail.com" ;

        $asunto = "Nuevo mensaje de contacto de " . $nombre ;

        $cuerpo_correo = "De: " . $nombre . "\n" ;
        $cuerpo_correo .= "Correo: " . $correo . "\n\n" ;
        $cuerpo_correo .= "Mensaje:\n" . $mensaje . "\n" ;

        //cabeceras del correo

        $headers = "From:" . $correo . "\r\n" ;
        $headers .= "Reply-To: " . $correo . "\r\n" ;
        $headers .= "X-Mailer: PHP/" . phpversion() ;

        if ( mail( $destinatario, $asunto, $cuerpo_correo, $headers ) ) {

            echo "!Gracias por tu mensaje, " . $nombre . " ! Tu mensaje ha sido enviado correctamente." ;
            header("Location: form_contacto.html?status=success");
        }else{

            echo "Lo sentimos, ha ocurrido un error al enviar tu mensaje. Por favor, inténtalo de nuevo más tarde." ;
        }
    }else{
        echo "¡Bienvenido! Por favor, llena el formulario de contacto.";
    }

?>