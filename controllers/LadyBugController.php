<?php
require_once "TwigBaseController.php";

class LadyBugController extends TwigBaseController {
    public $template = "object.twig";
    public $title = "Леди Баг";

    public function getContext() : array
    {
        $url = $_SERVER["REQUEST_URI"];

        $context = parent::getContext();
        
        $context['url_title'] = "LadyBug";

        $is_image = $url == "/LadyBug/image"; 
        $is_info = $url == "/LadyBug/info";

        $context['is_image'] = $is_image;
        $context['is_info'] = $is_info;

        return $context;
    }
}