<?php
require_once "CatNoirController.php";

class CatNoirInfoController extends CatNoirController {
    public $template = "catNoir_info.twig";

    public function getContext() : array
    {
        $context = parent::getContext();
        return $context;
    }
}