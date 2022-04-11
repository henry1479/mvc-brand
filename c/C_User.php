<?php
    include_once('m/User.php');
    include_once('C_Base.php');
    

    class C_User extends C_Base {
        private $user;

        function __construct ()
        {
            $this->user = new User;
        }
        // вывод информации о пользователе личном кабинете
        function actionInfo() 
        {
            session_start();
            $userInfo = $this->user->getUser($_SESSION['user_id']);
            $this->content = $this->template('v/u_info.php', array('username'=>$userInfo['login']));
        }


        public function actionRegister() {
            $this->title.="| Registration";
            $this->content = $this->template('v/v_regForm.php', []);
            
            if($this->isPost()){
                $info = $_POST['login'] . $_POST['email'];
                $result = $this->user->addNewUser($_POST['login'], $_POST['firstname'], $_POST['lastname'], $_POST['gender'], $_POST['password'], $_POST['email']);
                $this->content = $this->template('v/v_regForm.php', array('text'=>$result,'info'=>$info));
            }
            
        }

        function actionLogin () 
        {
            $this->title .= "Вход";
            $this->content = $this->template('v/v_login.php', array());

            if($this->isPost()){
    
                $result =$this->user -> login($_POST['login'], $_POST['password']);
                $this->content = $this->template('v/v_login.php', array('text'=> $result));
            }

            
        }

        function actionLogout() 
        {
            $this->user->logout();
            header("Location:".$_SERVER['PHP_SELF']);
        }
    }



?>