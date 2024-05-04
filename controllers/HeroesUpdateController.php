<?php
require_once "BaseHeroesTwigController.php";

class HeroesUpdateController extends BaseHeroesTwigController {
    public $template = "heroes_update.twig";

    public function get(array $context)
    {
        $id = $this->params['id'];
        $sql = <<<EOL
        SELECT * FROM heroes WHERE id = :id
        EOL;

        $query = $this->pdo->prepare($sql);
        $query->bindValue("id", $id);

        $query->execute();

        $data = $query->fetch();
        $context['heroes'] = $data;

        parent::get($context);
    }

    public function post(array $context) {
        $id = $this->params['id'];

        $title = $_POST['title'];
        $description = $_POST['description'];
        $type = $_POST['type'];
        $info = $_POST['info'];
        $image = $_POST['image1'];

        $tmp_name = $_FILES['image']['tmp_name'];
        $name =  $_FILES['image']['name'];
        
        move_uploaded_file($tmp_name, "../public/media/$name");
        $image_url = "/media/$name";
        if($tmp_name){
            $image=$image_url;
        }

        $sql = <<<EOL
        UPDATE heroes SET title = :title, description = :description, type = :type, info = :info, image = :image_url
        WHERE id = :id
        EOL;

        $query = $this->pdo->prepare($sql);
        $query->bindValue("id", $id);
        $query->bindValue("title", $title);
        $query->bindValue("description", $description);
        $query->bindValue("type", $type);
        $query->bindValue("info", $info);
        $query->bindValue("image_url", $image);//$image_url

        $query->execute();
        
        $context['message'] = 'Вы успешно отредактировали объект';
        $context['id'] = $id;

        $this->get($context);
    }
}