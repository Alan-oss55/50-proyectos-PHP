<?php 

    session_start() ;
    require("connection.php") ;

    if ( !isset($_SESSION['id_usuario']) ) {

        header("Location: login.php") ;
        exit ;
    }

    $id_usuario = $_SESSION['id_usuario'] ;

    //obtiene las tareas del usuario
    $sent_tareas = "SELECT * FROM tareas WHERE id_usuario = ? ORDER BY f_reg DESC " ;
    
    $stmt = $conexion_bd->prepare($sent_tareas ) ; 

    $stmt ->bind_param('i', $id_usuario ) ;

    $stmt->execute() ;

    $resultados = $stmt->get_result() ;


    $tareas = [] ;

    while ( $filas = $resultados->fetch_assoc() ) {

        $tareas []= $filas ;
    }

    $resultados->free() ;

    $stmt->close() ;

    // var_dump($tareas) ;

?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Gestor de Tareas</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <h1>Bienvenido a tu Gestor de Tareas</h1>
        <a href="logout.php">Cerrar Sesión</a>

        <hr>

        <h3>Agregar nueva tarea</h3>

        <form action="procesar_tarea.php" method="post">
            <input type="text" name="tarea" placeholder="Escribe tu tarea"> 
            <input type="hidden" name="action" value="insertar">
            <button type="submit">Agregar</button>
        </form>

        <hr>

        <h3>Tus tareas</h3>

        <?php if (count($tareas) > 0 ): ?>

            <table>

                <thead>

                    <tr>
                        <th>Tarea</th>
                        <th>Fecha registrada</th>
                        <th>Acciones</th>
                    </tr>

                </thead>


                <tbody>

                    <?php foreach( $tareas as $tarea ):  ?> 

                        <tr>

                            <td> <?php echo htmlspecialchars( $tarea['tarea'] ) ; ?> </td>
                            
                            <td> <?php echo htmlspecialchars( $tarea['f_reg'] ) ; ?> </td>

                            <td> <?php echo htmlspecialchars( ( $tarea['completado'] > 0 ) ? 'Completado' : 'Pendiente' ) ; ?> </td>

                            <td>
                                <form action="procesar_tarea.php" method="post" style="display:inline;" >
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="id" value="<?php echo $tarea['id'] ; ?>" >
                                    <button type="submit">Anular</button>
                                </form>

                                <a href="editar_tarea.php?id=<?php echo $tarea['id'] ; ?>">
                                    <button>Editar</button>
                                </a>
                            </td>

                            
                        </tr>

                    <?php endforeach ; ?>

                </tbody>


            </table>

        <?php  else : ?>
            <p>No tienes tareas registradas</p>

        <?php  endif; ?>
    </body>
    
</html>