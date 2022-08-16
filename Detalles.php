<?php
    include 'db.php';
    include 'datospersonales.php';
    $cedula = $_GET['cedula'];
    $datosPersonales = DatosPersonales::mostrar($cedula);



?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modificar registro</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/darkly/bootstrap.min.css">
    </head>
    <body>

        <div class="card col-md-6 mx-auto mt-8">
                    
             <div class="card-body  " >
                    <h2 class="card col-md-8 mx-auto ">Detalles de registro</h2>
                        <legend >Cedula:</legend><?=$datosPersonales->getCedula()?>
                        <legend>Nombre:</legend><?=$datosPersonales->getNombre()?>
                        <legend>Peso:</legend><?=$datosPersonales->getPeso()?>
                        <legend>estatura:</legend><?=$datosPersonales->getEstatura()?>
                        <legend>objetivo:</legend><?=$datosPersonales->getObjetivo()?>
                        <legend>observaciones:</legend><?=$datosPersonales->getObservaciones()?>

                       
                   
             </div>
              <button class="btn btn-lg  btn-outline-danger" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation"
                     onClick= "location.href='./indexPersonas.php' ">Atras</button>
            
        </div>
        
    </body>
</html>