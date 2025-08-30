<?php

    session_start() ;
    require('connetion.php') ;

    if ( !isset( $_SESSION['id_usuario'] ) || $_SERVER["METHOD_REQUEST"] != "POST" ){
        header("Location: login.php") ;
        exit ;
    }

    $id_usuaro = $_SESSION['id_usuario'] ;

    $accion = $_POST["accion"] ;

    
    if ( $accion == 'insertar'){

    }

    if ( $accion == 'delete'){
        
    }

    header("Location: v_tareas.php") ;
    exit ;
?>