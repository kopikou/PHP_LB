<?php

class LoginRequiredMiddleware extends BaseMiddleware{
    public function apply(BaseController $controller, array $context) {
        //$query = $controller->pdo->prepare("SELECT * FROM users");
        //$query->execute();
        //$data = $query->fetch();


        //$username = $data[0]['username'];
        //$passwordus = $data[0]['password'];
        //print_r($passwordus);
        //$valid_user = "user";
        //$valid<?php_password = "";

        //$user = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : '';
        //$password = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : '';

        //$query = $controller->pdo->prepare("SELECT password FROM users WHERE username = :user");
        //$query->bindValue("user", $user);
        //$query->execute();
        //$data = $query->fetch();
        //print_r($data['password']);


        //if ($data['username'] != $user || $data['password'] != $password) {
        //if ($data['password'] != $password) {    
            //header('WWW-Authenticate: Basic realm="Heroes"');
            //http_response_code(401); 
            //exit; 
        //}



        $is_logged = isset($_SESSION["is_logged"]) ? $_SESSION["is_logged"] : false;

        if(!$is_logged){
            header("Location: /login");
            exit;
        }
    }
}