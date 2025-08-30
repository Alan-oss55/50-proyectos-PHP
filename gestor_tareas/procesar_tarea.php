<?php

    session_start() ;
    require('connection.php') ;

    if ( !isset( $_SESSION['id_usuario'] ) || $_SERVER["METHOD_REQUEST"] != "POST" ){
        header("Location: login.php") ;
        exit ;
    }

    $id_usuario = $_SESSION['id_usuario'] ;

    $accion = $_POST["action"] ;

    
    if ( $accion == 'insertar' && !empty( trim( $_POST["tarea"] ) ) ) {

        $tarea = $_POST['tarea'] ;

        $f_reg = new DateTime() ;

        $campos = "id_usuario, tarea, f_reg" ;

        $sql = "INSERT INTO tareas (" . $campos . ")" ;

        $sql .= "VALUES(" ;

        $sql .= $id_usuario ;

        $sql .= ", '" . $tarea . "'" ;

        $sql .= ", '" . $f_reg .  "'" ;

        $sql .= ")" ;

        $stmt = $conexion_bd->prepare( $sql ) ;

        $stmt->bind_param("is" , $id_usuario, $tarea );

        $stmt->execute() ;

        $stmt->close();

    }

    if ( $accion == 'delete' && isset( $_POST['id'] ) ) {

        $id_tarea =  $_POST['id'] ;

        $sent_anular_registro = "UPDATE tareas SET id_estado = 0 WHERE id = ? " ;
        
        $stmt = $conexion_bd->prepare( $sent_anular_registro ) ;
        $stmt->bind_param( "ii" , $id_tarea , $id_usuario ) ;
        $stmt->execute() ;
        $stmt->close() ;

    }

    header("Location: v_tareas.php") ;
    exit ;
?>