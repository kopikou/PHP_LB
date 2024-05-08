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
        //print_r($data);

        //if($data['username'] == $login && $data['password'] == $password){
        if($data){ 
            $_SESSION["is_logged"] = true;
            //header("Location: /");
            //exit;
            //print_r($data['username']);
            //print_r($data['password']);
        }
    }
}

/*BaseHeroesTwigController{
    public $template = "login.twig";

    public function get(array $context)
    {
        echo $_SERVER['REQUEST_METHOD'];
        
        parent::get($context);
        $url = $_SERVER['HTTP_REFERER'];
        header("Location: $url");
        exit;
    }

    public function post(array $context) {
        $login = $_POST['login'];
        $password = $_POST['password'];

        $query = $this->pdo->prepare("SELECT * FROM users WHERE username = :user AND password = :password");
        $query->bindValue("user", $login);
        $query->bindValue("password", $password);

        $query->execute();
        $data = $query->fetch();
        //print_r($data);

        if($data['username'] == $login && $data['password'] == $password){
            $_SESSION["is_logged"] = true;
            header("Location: /");
            exit;
            print_r($data['username']);
            print_r($data['password']);
        }

        
        $this->get($context);
    }

}*/