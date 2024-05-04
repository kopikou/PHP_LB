<?php
require_once "BaseHeroesTwigController.php";
class ObjectController extends BaseHeroesTwigController{
    public $template = "object.twig";

    public function getTemplate($context)
    {
        if(isset($_GET['show'])){
            $show = $_GET['show'];
            $template = "object_$show.twig";
        }else{
            $template = "object.twig";
        }
        return $template;
    }
    
    public function getContext(): array
    {
        $context = parent::getContext();

        $query = $this->pdo->prepare("SELECT * FROM heroes WHERE id= :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();
        $data = $query->fetch();
        
        $context['description'] = $data['description'];
        $context['title'] = $data['title'];
        $context['id'] = $data['id'];
        //$context['image'] = $data['image'];
        //$context['info'] = $data['info'];
        $context['url'] = "/heroes/$data[id]";

        if(isset($_GET['show'])){
            $context['url'] = "/heroes/$data[id]?show=$_GET[show]";
            $context[$_GET['show']] = $data[$_GET['show']];
        }else{
            $context['url'] = "/heroes/$data[id]";
        }
        
        return $context;
    }
}