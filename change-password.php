<?php 
    session_start();
    if(!isset($_SESSION['id'])) header('Location: index.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include('includes/header.php'); ?>

    <title>Cambiar contraseña</title>

    <script>
        let validateIdicatorUser = true;
        let validateIdicatorPsw = true;
        let validateIdicatorRPsw = true;

        function validation(){
            if($('#update-user').val() == '') 
                $('#update-user-sign').show();
            else $('#update-user-sign').hide();
            
            if($('#update-psw').val() == '') 
                $('#update-psw-sign').show();
            else $('#update-psw-sign').hide();
            
            if($('#update-repit-psw').val() == '') 
                $('#update-repit-psw-sign').show();
            else $('#update-repit-psw-sign').hide();
        }

        function validationUser(){
            if($('#update-user').val().length >= 4){
                $('#update-user-alert1').hide();
                validateIdicatorUser = false;
            }else{ 
                $('#update-user-alert1').show();
                validateIdicatorUser = true;
            }
        }

        function validationPassword(){
            if($('#update-psw').val().length >= 4){
                $('#update-psw-alert1').hide();
                validateIdicatorPsw = false;
            }else{ 
                $('#update-psw-alert1').show();
                validateIdicatorPsw = true;
            }
        }

        function validationConfirmPassword(){
            if($('#update-psw').val() == $('#update-repit-psw').val()) {
                $('#update-repit-psw-alert1').hide();
                validateIdicatorRPsw = false;
            }else{ 
                $('#update-repit-psw-alert1').show();
                validateIdicatorRPsw = true;
            }
        }

        function submitForm(){
            validationUser();
            validationPassword();
            validationConfirmPassword();

            if(validateIdicatorUser||validateIdicatorPsw||validateIdicatorRPsw) return false;
            console.log('hola');
            $('#formId').submit();
        }
    </script>
</head>
<body>
    <div class="container">

        <div class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <a href="api/routes.php" class="text-info">Salir</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-start">
            <div class="col"></div>

                <div class="col-6">
                    <div class="card">
                        <div class="card-header text-primary text-center"><h6>Cambiar contraseña</h6></div>
                        <div class="card-body">
                            
                            <form action="api/routes.php" method="POST" id="formId">

                                <input type="hidden" name="update-user-id" value="<?php echo $_SESSION['id']; ?>">

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            Usuario
                                            <span class="text-danger" id="update-user-sign">&nbsp;*</span>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" id="update-user" name="update-user" placeholder="Usuario" required
                                        onkeyup="validation()" onchange="validation(), validationUser()" readonly
                                        value="<?php echo $_SESSION['user']; ?>"
                                    >
                                    <span class="text-danger input-group" id="update-user-alert1" style="display:none">
                                        *&nbsp;Ingrese un usuario valido (debe contener al menos 4 caracteres)
                                    </span>
                                </div>
                                
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            Contraseña
                                            <span class="text-danger" id="update-psw-sign">&nbsp;*</span>
                                        </span>
                                    </div>
                                    <input type="password" class="form-control" id="update-psw" name="update-psw" placeholder="Contraseña" required
                                        onkeyup="validation()" onchange="validation(), validationPassword()" 
                                    >
                                    <span class="text-danger input-group" id="update-psw-alert1" style="display:none">
                                        *&nbsp;Ingrese una contraseña valida (debe contener al menos 4 dígitos)
                                    </span>
                                </div>

                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            Confirmar contraseña
                                            <span class="text-danger" id="update-repit-psw-sign">&nbsp;*</span>
                                        </span>
                                    </div>
                                    <input type="password" class="form-control" id="update-repit-psw" name="update-repit-psw" placeholder="Confirmar contraseña" required
                                        onkeyup="validation()" onchange="validation(), validationConfirmPassword()" 
                                    >
                                    <span class="text-danger input-group" id="update-repit-psw-alert1" style="display:none">
                                        *&nbsp;Las contraseñas no coinciden
                                    </span>
                                </div>

                                <div class="text-center">
                                    <button type="button" class="btn btn-sm btn-outline-warning btn-lg btn-block" onclick="submitForm()">Actualizar</button>
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