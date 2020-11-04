<?php
    class LoginController{

        public function setUserSession(){
            if (@$_POST['usecase']=="uclogin"){

                $email = $_POST['email'];
                $password = $_POST['password'];
                $sql = "SELECT * FROM  tbl_Users WHERE userEmail='$email' AND userPassword='$password'";

                $ControlDAO = new ControlDAO;
                $user_details = $ControlDAO->sqlSelect($sql,102);

                //Set session variables
                if (!$user_details){
                    $_SESSION['status'] = "Email or password incorrect.";
                } else {
                    $_SESSION['username'] = $user_details['firstName'] . ' '. $user_details['lastName'];
                }
            }

        }

        public function sessionDestroy(){
            if (@$_POST['usecase']=="uclogout"){
                session_destroy();
                unset($_SESSION['username']);
            }
        }

        public function displayLogin(){
            if (isset($_SESSION['username'])) {
                $displayController = new Gateway;
                $displayController->uriRoutes();
            }else{
                $displayController = new LoginView;
                $displayController->displayBody();
            }
        }
    }
?>