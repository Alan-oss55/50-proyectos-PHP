<!DOCTYPE html>
<html>
    <head>
        <meta charset="UFT-8">
        <title>Tech Solutions S.A</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <h1>Frase del día de Tech Solutions S.A</h1>

        <?php 

            $frases = [

                "La tecnología es la ciencia del futuro, y en Tech Solutions S.A. lo construimos hoy.",
                "El único límite a nuestros logros de mañana es la duda de hoy.",
                "Un gran poder conlleva una gran responsabilidad, especialmente en ciberseguridad.",
                "La innovación distingue a un líder de sus seguidores.",
                "Si puedes soñarlo, puedes programarlo. ¡Nosotros te ayudamos!",
                "La programación es el arte de crear mundos con palabras y lógica.",

            ] ;

            $indice_aleatorio = array_rand( $frases ) ;

            $frase_aleatoria = $frases[ $indice_aleatorio ] ; 
        ?>
        
        <h2><?php echo $frase_aleatoria ;?></h2>
    </body>
</html>