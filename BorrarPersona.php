<?php 
    include 'db.php';
    include 'datospersonales.php';
    $cedula = $_GET['cedula'];
    DatosPersonales::delete($cedula);
    
    header('Location: indexPersonas.php') ;//LO ENVIA AL INDEX
?>