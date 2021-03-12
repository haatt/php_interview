<?php
    session_start();

    class Users{

        private function connection(){

            $con = mysqli_connect(
                'localhost', //host de enrrutamiento de base de datos
                'root', //usuario de MySQL (con permisos a base de datos) 
                '', // Contraseña de usuario de MySQL
                'php_interview' // nombre de base de datos
            );

            return $con;
        }

        public function create($user, $password){

            if($user == '' || $password == '') return false;
            
            $query = "INSERT INTO `users` (`id`, `user`, `password`, `created_at`) VALUES (NULL, '$user', '$password', CURRENT_TIMESTAMP);";

            $response = mysqli_query($this->connection(), $query);

            if($response){
                $user = mysqli_query($this->connection(), "SELECT MAX(id) as id, user, password FROM users");
                $user = mysqli_fetch_array($user,MYSQLI_ASSOC);
                
                $_SESSION['id'] = $user['id'];
                $_SESSION['user'] = $user['user'];
                
            }else return false;
        }

        public function getUser($user, $userPassword){

            if($user == '' || $userPassword == '') return false;
            
            $query = "SELECT id, user, password FROM users WHERE user = '$user' AND password = '$userPassword'";

            $response = mysqli_query($this->connection(), $query);
            
            if($response){
                $user = mysqli_fetch_array($response,MYSQLI_ASSOC);
                
                $_SESSION['id'] = $user['id'];
                $_SESSION['user'] = $user['user'];
                
            }else return false;
        }

        public function updateUser($userId, $password){

            if($userId == '' || $password == '') return false;
            
            $query = "UPDATE users SET password = '$password' WHERE id = $userId;";

            $response = mysqli_query($this->connection(), $query);

            if($response){
                return true;                
            }else return false;
        }
    }

?>