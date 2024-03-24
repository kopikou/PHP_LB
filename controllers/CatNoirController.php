<?php
require_once "TwigBaseController.php";

class CatNoirController extends TwigBaseController {
    public $template = "object.twig";
    public $title = "Супер Кот";

    public function getContext() : array
    {
        $url = $_SERVER["REQUEST_URI"];

        $context = parent::getContext();
        
        $context['url_title'] = "CatNoir";

        $is_image = $url == "/CatNoir/image"; 
        $is_info = $url == "/CatNoir/info";

        $context['is_image'] = $is_image;
        $context['is_info'] = $is_info;

        return $context;
    }
}