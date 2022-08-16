<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error en la Busqueda.</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/superhero/bootstrap.min.css">
</head>
<body>
    <div class="alert alert-dismissible alert-warning">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <h4 class="alert-heading">Cuidado!</h4>
    <p class="mb-0">Usted ha digitado un número de cédula registrado. la cédula registrada se encuentra a nombre de
         <?=$personaEncontrada->getNombre()?> </a>.</p>
    </div>
</body>
</html>