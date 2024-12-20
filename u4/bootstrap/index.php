<?php 
    include_once "./app/AuthController.php"

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 6</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <style type="text/css">
        .container {
            margin-top: 100px;
        }

        .custom-width {
            width: 100%;
            margin-bottom: 55px;
        }
    </style>
</head>

<body>

    <div class="container shadow-lg rounded">
        <div class="row align-items-center">
            <div class="col-12 col-md-6">
                <img class="bg-img img-fluid rounded" src="https://img.freepik.com/fotos-premium/cientifico-trabajando-diligentemente-laboratorio-alta-tecnologia_497783-168.jpg" alt="">
            </div>
            <div class="col-12 col-md-6">
                <div class="text-center">
                    <img class="logo-img img-fluid" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_XtCgHXOTINsOKLRHF_pIsDmP0o_TmZ4PEA&s" alt="">
                </div>
                <h3>Accede al Panel Administrador</h3>
                <form method="POST" action="./app/AuthController.php">
                    <div class="mb-3">
                        <label for="username" class="form-label">Correo</label>
                        <input type="email" class="form-control" name="email" aria-describedby="usernameHelp" placeholder="write here" required>
                        <div id="usernameHelp" class="form-text">*Necesitamos un nombre de usuario para iniciar sesión.</div>
                    </div>
                    <div class="mb-5">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="password" aria-describedby="passwordHelp" placeholder="write here" required>
                        <div id="passwordHelp" class="form-text">*Necesitamos una contraseña para iniciar sesión.</div>
                    </div>
                    <button type="submit" class="btn btn-primary custom-width">Iniciar Sesión</button>

                    <input type="hidden" name="action" value="login">
                    <input type="hidden" name="global_token" value="token">
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
