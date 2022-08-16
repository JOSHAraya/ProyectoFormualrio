<?php
    
    //GUARDA TODOS LOS DATOS 
    require_once 'datospersonales.php'; //carga las recetas
    require_once 'db.php';
    
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $peso = $_POST['peso'];
    $estatura = $_POST['estatura'];
    $objetivo = $_POST['objetivo'];
    $Observaciones = $_POST['observaciones'];
    

    //objetos de datos personales 
    $datos1 = new DatosPersonales();

    $datos1->setCedula($cedula);
    $datos1->setNombre($nombre);
    $datos1->setPeso($peso);
    $datos1->setEstatura($estatura);
    $datos1->setObjetivo($objetivo);
    $datos1->setObservaciones($Observaciones);


    
    DatosPersonales::actualizar($datos1);
    header('Location: indexPersonas.php') ;//LO ENVIA AL INDEX
  
?>

