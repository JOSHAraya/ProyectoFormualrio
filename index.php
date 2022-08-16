



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
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#">Registros de Personal</a>

        </div>
        <h2 align="center"> Para Ingresar a los formulario presione "Ingresar"</h2>
        
        <p>Gracias a este metodo<a href="#"> conectamos </a> de manera mas efectivo a los formularios </p>
        <p><small>Si desea Iniciar sesion presiona el boton</small></p>



        <div class="form-group col-md-6 mx-auto mt-6"> 
        <form action="indexPersonas.php" method= "POST">
            <label class="form-label mt-4">Correo Electronico</label>
            <div class="form-floating mb-3">
                <input type="e-mail" class="form-control" id="registro" placeholder="Correo" required>
                <label for="registro"  ></label>
            </div>
            <div class="form-floating">
            <label class="form-label mt-4">Contraseña</label>
                <input type="password" class="form-control" id="contraseña" placeholder="Password" required>
            </div>
            
                <button type="submit" class="btn btn-outline-danger"
                  >Ingresar</button>
        </div>

    </body>
</html>
