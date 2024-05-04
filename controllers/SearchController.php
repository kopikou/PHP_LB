<?php
require_once "BaseHeroesTwigController.php";
class SearchController extends BaseHeroesTwigController{
    public $template = "search.twig";

    public function getContext() : array
    {
        $context = parent::getContext();
        
        $type = isset($_GET['type']) ? $_GET['type'] : '';

        $query = $this->pdo->prepare("SELECT id FROM types WHERE title= :title_type");
        $query->bindValue("title_type", $type);
        $query->execute();
        $type_id = $query->fetchColumn();

        $title = isset($_GET['title']) ? $_GET['title'] : '';
        $info = isset($_GET['info']) ? $_GET['info'] : '';

        if($type == 'все'){
            $sql = <<<EOL
            SELECT id, title
            FROM heroes
            WHERE (:title = '' OR title like CONCAT('%', :title, '%')) 
            AND (:info = '' OR info like CONCAT('%', :info, '%'))        
            EOL;
        }else{
            $sql = <<<EOL
            SELECT id, title
            FROM heroes
            WHERE (:title = '' OR title like CONCAT('%', :title, '%'))
            AND (type = :type) AND (:info = '' OR info like CONCAT('%', :info, '%'))          
            EOL;
        }
        $query = $this->pdo->prepare($sql);
        $query->bindValue("title", $title);
        $query->bindValue("type", $type_id);
        $query->bindValue("info", $info);
        $query->execute();

        $context['heroes'] = $query->fetchAll();
        

        return $context;
    }
}