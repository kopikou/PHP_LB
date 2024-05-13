<?php

class LoginController extends BaseHeroesTwigController {
    public $template = "login.twig";
    public function post(array $context){
        $login = $_POST['login'];
        $password = $_POST['password'];

        $query = $this->pdo->prepare("SELECT * FROM users WHERE username = :user AND password = :password");
        $query->bindValue("user", $login);
        $query->bindValue("password", $password);

        $query->execute();
        $data = $query->fetch();

        if($data){ 
            $_SESSION["is_logged"] = true;
            header("Location: /");
            exit;
        }else{
            $_SESSION["is_logged"] = false;
            $this->get($context);
        }
    }
}