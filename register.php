<?php 
    session_start();
    if(isset($_SESSION['id'])) header('Location: change-password.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include('includes/header.php'); ?>

    <title>Registrarse</title>

    <script>
        let validateIdicatorUser = true;
        let validateIdicatorPsw = true;
        let validateIdicatorRPsw = true;

        function validation(){
            if($('#regist-user').val() == '') 
                $('#regist-user-sign').show();
            else $('#regist-user-sign').hide();
            
            if($('#regist-psw').val() == '') 
                $('#regist-psw-sign').show();
            else $('#regist-psw-sign').hide();
            
            if($('#regist-repit-psw').val() == '') 
                $('#regist-repit-psw-sign').show();
            else $('#regist-repit-psw-sign').hide();
        }

        function validationUser(){
            if($('#regist-user').val().length >= 4){
                $('#regist-user-alert1').hide();
                validateIdicatorUser = false;
            }else{ 
                $('#regist-user-alert1').show();
                validateIdicatorUser = true;
            }
        }

        function validationPassword(){
            if($('#regist-psw').val().length >= 4){
                $('#regist-psw-alert1').hide();
                validateIdicatorPsw = false;
            }else{ 
                $('#regist-psw-alert1').show();
                validateIdicatorPsw = true;
            }
        }

        function validationConfirmPassword(){
            if($('#regist-psw').val() == $('#regist-repit-psw').val()) {
                $('#regist-repit-psw-alert1').hide();
                validateIdicatorRPsw = false;
            }else{ 
                $('#regist-repit-psw-alert1').show();
                validateIdicatorRPsw = true;
            }
        }

        function submitForm(){
            validationUser();
            validationPassword();
            validationConfirmPassword();

            if(validateIdicatorUser||validateIdicatorPsw||validateIdicatorRPsw) return false;
            
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
                        <a href="signin.php" class="text-info">Ingresar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-start">
            <div class="col"></div>

                <div class="col-6">
                    <div class="card">
                        <div class="card-header text-primary text-center"><h6>Registrarse</h6></div>
                        <div class="card-body">
                            
                            <form action="api/routes.php" method="POST" id="formId">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            Usuario
                                            <span class="text-danger" id="regist-user-sign">&nbsp;*</span>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" id="regist-user" name="regist-user" placeholder="Usuario" required
                                        onkeyup="validation()" onchange="validation(), validationUser()" 
                                    >
                                    <span class="text-danger input-group" id="regist-user-alert1" style="display:none">
                                        *&nbsp;Ingrese un usuario valido (debe contener al menos 4 caracteres)
                                    </span>
                                </div>
                                
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            Contraseña
                                            <span class="text-danger" id="regist-psw-sign">&nbsp;*</span>
                                        </span>
                                    </div>
                                    <input type="password" class="form-control" id="regist-psw" name="regist-psw" placeholder="Contraseña" required
                                        onkeyup="validation()" onchange="validation(), validationPassword()" 
                                    >
                                    <span class="text-danger input-group" id="regist-psw-alert1" style="display:none">
                                        *&nbsp;Ingrese una contraseña valida (debe contener al menos 4 dígitos)
                                    </span>
                                </div>

                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            Confirmar contraseña
                                            <span class="text-danger" id="regist-repit-psw-sign">&nbsp;*</span>
                                        </span>
                                    </div>
                                    <input type="password" class="form-control" id="regist-repit-psw" name="regist-repit-psw" placeholder="Confirmar contraseña" required
                                        onkeyup="validation()" onchange="validation(), validationConfirmPassword()" 
                                    >
                                    <span class="text-danger input-group" id="regist-repit-psw-alert1" style="display:none">
                                        *&nbsp;Las contraseñas no coinciden
                                    </span>
                                </div>

                                <div class="text-center">
                                    <button type="button" class="btn btn-sm btn-outline-warning btn-lg btn-block" onclick="submitForm()">Registrar</button>
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