<?php
require_once "BaseHeroesTwigController.php";

class MainController extends BaseHeroesTwigController {
    public $template = "main.twig";
    public $title = "Главная";

    public function getContext() : array
    {
        $context = parent::getContext();
        
        //$context['menu_items'] = [
            //[
                //"title" => "Леди Баг",
                //"url_title" => "LadyBug",
            //],
            //[
                //"title" => "Супер Кот",
                //"url_title" => "CatNoir",
            //]
        //];

        if(isset($_GET['type'])){
            $query = $this->pdo->prepare("SELECT * FROM heroes WHERE type = :type");
            $query->bindValue("type",$_GET['type']);
            $query->execute();
        }else{
            $query = $this->pdo->query("SELECT * FROM heroes");
        }
        
        $context['heroes'] = $query->fetchAll();

        return $context;
    }
}