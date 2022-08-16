<?php
    require_once 'datospersonales.php'; 
    require_once 'db.php';
    if(isset($_POST['nombre'])){
        $listadoDatos= DatosPersonales::buscarNombre($_POST['nombre']);
        
    }else{
        
        $listadoDatos= DatosPersonales::listarTodos();
    }
    
       
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro Datos </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/superhero/bootstrap.min.css">
    </head>
    <body>
        
    <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <a class="navbar-brand" href="#">Clientes Registrados </a>
                
               
                <div class= col-md-12 >
                    <form class="form-inline" method="POST">
                        <div class="form-group ">
                            <label for="email">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name='nombre' >
                        </div>
                      <button type="submit" class="btn btn-secondary float-righ">Buscar</button>
                    </form>

                   
               </div>  

               
                   
               
               
    </div>
        
        <div class="containe col-md-12 mx-auto mt-5">

             <button class="btn btn-secondary float-right"
               onClick= "location.href='./formularioInsertar.php' "> Agregar Personas </button>
               <div class="containe col-md-10 mx-auto " >
                            <button class="btn btn-secondary float-right"
                            onClick= "location.href='./indexPersonas.php' "> Mostrar Todo </button>
                    </div>
                    <div class="containe col-md-8 mx-auto ">
                        <button class="btn btn-secondary float-right"
                         onClick= "location.href='./index.php' ">Salir</button>
                    </div>
                    
               

            <table class="table table-hover">
                    <thead>
                        <tr>
                            <th >#</th>
                            <th >Cedula</th>
                            <th >nombre</th>
                            <th>Acciones</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($listadoDatos as $key=>$dato):
                                
                        ?>
                        <tr <?php
                                if($key%2 ==0){
                                    $clase = "table-dark";
                                }else{
                                    $clase= "table-secundary";
                                }
                        ?> 
                        class="<?=$clase?>">
                            <th><?=$key+1 ?> </th>
                            <td> <?=$dato->getCedula() ?> </td>
                            <td> <?=$dato->getNombre()?> </td>
                            <td>
                                <button class="btn btn-outline-info" 
                                onClick= "location.href='./formularioModificar.php?cedula=<?=$dato->getCedula()?>' ">Modificar </button>

                                <button class="btn btn-outline-danger" 
                                onclick="location.href='./BorrarPersona.php?cedula=<?=$dato->getCedula()?>' ">Borrar</button>
                                    
                                <button class="btn btn-outline-warning"
                                onclick="location.href='./Detalles.php?cedula=<?=$dato->getCedula()?>' " >Detalle</button>
                            </td>
                        </tr>

                        <?php
                            endforeach;
                        ?>


                    </tbody>     
            </table>


        </div>
    </body>
</html>
