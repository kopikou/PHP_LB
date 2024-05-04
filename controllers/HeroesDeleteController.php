<?php
class HeroesDeleteController extends BaseController {
    public function post(array $context)
    {
        //$id = $_POST['id'];
        $id = $this->params['id'];

        $sql =<<<EOL
        DELETE FROM heroes WHERE id = :id
        EOL; 
        
        $query = $this->pdo->prepare($sql);
        $query->bindValue(":id", $id);
        $query->execute();

        header("Location: /");
        exit;
    }
}    