<?php

    session_start();
    session_unset();
    session_destroy();

    header("Location: consulta.php");

    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location: admin.php');
            break;

            case 2:
            header('location: usuario.php');
            break;

            default:
        }
    }