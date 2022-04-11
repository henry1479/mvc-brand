<?php
    include_once('./data/configDB.php');
    class User {
        private $connect;
        
        function __construct()
        {
            $this->connect = $this->connecting();
        }

        function pass ($name, $password) {
            // шифровка пароля  помощью перевернутого хэша
            return strrev(md5($name) . md5($password));
        }
        // коннект с бд
        function connecting() {
            return new PDO('mysql:host='.SERVER.';dbname='.DBNAME, USER, PASSWORD);
        } 

        function getUser($id)
        {
           
            return $this->connect->query("SELECT * FROM users WHERE id ='".$id."'")->fetch();
        }

        // вненсение в бд нового пользователя
        function addNewUser($login,$name,$lastName,$gender,$password,$email)
         {
            
            $user = $this->connect->query("SELECT * FROM users WHERE login = '".$login."'")->fetch();
            if(!$user) {
                $result = $this->connect->exec("INSERT INTO `users`(`id`, `login`,`name`,`lastname`,`gender`, `password`,`email`) VALUES (null,
                '".$login.
                "','".$name .
                "','". $lastName .
                "','". $gender.
                "','". $this->pass($login,strip_tags($password)).
                "','".$email."')");
                $error = $this->connect->errorInfo();
                return ($result) ? "You are registered successfully!!": $error; 
            } else {
                return "User with this login is exist";
            }
        }

        // вход в систему уже существующего пользователя
        function login($login, $password) 
        {
            $user=$this->connect->query("SELECT * FROM users WHERE login='".$login."'")->fetch();
            if($user){
                if($user['password'] == $this->pass($user['login'],strip_tags($password))){
                    session_start();
                    $_SESSION['user_id'] = $user['id'];
                    return "Добро пожаловать в систему {$user['login']}!";
                } else {
                    return "Пароль неверный!";
                }
            }

        }
        // выход из системы
        function logout()
        {
            session_start();
            if(isset($_SESSION["user_id"])){
                $_SESSION["user_id"] = null;
                session_destroy();
                return true;
            }
        }
    }


?>