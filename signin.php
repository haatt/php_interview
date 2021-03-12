<?php 
    session_start();
    if(isset($_SESSION['id'])) header('Location: change-password.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include('includes/header.php'); ?>

    <title>Iniciar sesión</title>
    <script>

    </script>
</head>
<body>
    <div class="container">
        <div class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <a href="register.php" class="text-info">Registrarse</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-start">
            <div class="col"></div>

                <div class="col-4">
                    <div class="card">
                        <div class="card-header text-primary text-center"><h6>Iniciar sesión</h6></div>
                        <div class="card-body">
                            
                            <form action="api/routes.php" method="GET">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Usuario</span>
                                    </div>
                                    <input type="text" class="form-control" name="signin-user" id="signin-user" placeholder="Usuario" required>
                                </div>
                                
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Contraseña</span>
                                    </div>
                                    <input type="password" class="form-control" name="signin-psw" id="signin-psw" placeholder="Contraseña" required>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-sm btn-outline-primary btn-lg btn-block">Ingresar</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            
            <div class="col"></div>
        </div>
    </div>
</body>

<?php include('includes/footer.php'); ?>

</html>