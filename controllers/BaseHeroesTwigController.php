<?php 
class BaseHeroesTwigController extends TwigBaseController{
    public function getContext() : array
    {
        $context = parent::getContext();

        $query = $this->pdo->query("SELECT * FROM types");
        $types = $query->fetchAll();
        $context['types'] = $types;


        if(!isset($_SESSION['pages'])){
            $_SESSION['pages'] = [];
        }
        if(count($_SESSION['pages']) >= 10){
            array_pop($_SESSION['pages']);
        }
        array_unshift($_SESSION['pages'],$_SERVER["REQUEST_URI"]);

        $context["pages"] = isset($_SESSION['pages']) ? $_SESSION['pages'] : "";

        return $context;
    }
}