
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

        <div class="card col-md-6 mx-auto mt-6">
             <div class="card-body">
                    <h3  align="center" class="card-title">Modificar  registro</h3>
                    <form action="actualizarP.php" method= "POST">

                        <div class="form-group row">
                            <label  align="right" for="cedula" class="col-sm-4 col-form-label">Cedula:</label>
                             <div class="col-sm-4">
                                <input type="text " name= "cedula" id= "cedula" class="form-control-plaintext"
                                pattern="[1-9]{1}-[0-9]{4}-[0-9]{4}" 
                                value="<?=$datosPersonales->getCedula()?>" readonly>


                    <div class="form-group row">
                        <label for="nombre" class="col-sm-4 col-form-label">Nombre:</label>
                        <div class="col-sm-8">
                            <input type="text " name= "nombre" id= "nombre" class="form-control-plaintext"
                            placeholder= "Digite su nombre completo  " 
                            value="<?=$datosPersonales->getNombre()?>"required>
                        
                        </div>
                    </div>

                     <div class="form-group row">
                        <label for="peso" class="col-sm-4 col-form-label">Peso:</label>
                        <div class="col-sm-6">
                            <input type="text" name="peso" id= "peso"  class="form-control-plaintext"
                                placeholder= "kg " 
                                value="<?=$datosPersonales->getPeso()?>" 
                                required>    
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="estatura" class="col-sm-4 col-form-label">Estatura:</label>
                        <div class="col-sm-6">
                            <input type="text" name="estatura" id= "estatura"  class="form-control-plaintext"
                            placeholder= "Digite su puesto estatura en cm  "
                            value="<?=$datosPersonales->getEstatura()?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="objetivo" class="col-sm-5 col-form-label">Objetivo:</label>
                        <div class="col-sm-10">
                            <input type="text" name="objetivo" id= "objetivo"  class="form-control-plaintext"
                            placeholder= "Digite su ojetivo  " 
                            value="<?=$datosPersonales->getObjetivo()?>"required>
                        </div>
                    </div>

                    
                    <div class="form-group row">
                        <label for="observaciones" class="col-sm-6 col-form-label">Observaciones:</label>
                        <div class="col-sm-10">
                            <input type="text" name="observaciones" id= "observaciones"  class="form-control-plaintext"
                            placeholder= "Digite una observacion fisica. " 
                            value="<?=$datosPersonales->getObservaciones()?>"required>
                        </div>
                    </div>

            
                        <button type="submit" class="btn btn-outline-warning"
                        >Actualizar Datos</button>
                        <button type="submit" class="btn btn-danger"
                        onClick= "location.href='./indexPersonas.php' " >Atras</button>
                    </form> 
             </div>
            
        </div>
        
    </body>
</html>
