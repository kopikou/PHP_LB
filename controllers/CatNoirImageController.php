<?php
require_once "CatNoirController.php";

class CatNoirImageController extends CatNoirController {
    public $template = "object_image.twig";

    public function getContext() : array
    {
        $context = parent::getContext();
        $context['image'] = "/img/catnoir.jpeg";
        return $context;
    }
}