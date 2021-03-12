<?php
    include('../class/users.php');
    $user = new Users();

    switch($_SERVER['REQUEST_METHOD']){
        case 'POST':
            
            if(isset($_POST['update-user-id'])){
                $user->updateUser($_POST['update-user-id'],$_POST['update-psw']);
            }else{
                $user->create($_POST['regist-user'],$_POST['regist-psw']);
            }
            header("Location: ../change-password.php");
        break;
        case 'GET':
            echo $_SERVER['REQUEST_METHOD'];
            if(isset($_GET['signin-psw'])){
                echo $user->getUser($_GET['signin-user'], $_GET['signin-psw']);
                header("Location:../change-password.php");
            }else{
                session_destroy();
                session_unset();
                header("Location:../");
            }
        break;
        case 'PUT':
            $user->updateUser($_PUT['update-user-id'],$_PUT['update-psw']);
        break;
    }
?>