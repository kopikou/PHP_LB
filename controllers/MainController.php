<?php
require_once "TwigBaseController.php";

class MainController extends TwigBaseController {
    public $template = "main.twig";
    public $title = "Главная";

    public function getContext() : array
    {
        $context = parent::getContext();
        
        $context['menu_items'] = [
            [
                "title" => "Леди Баг",
                "url_title" => "LadyBug",
            ],
            [
                "title" => "Супер Кот",
                "url_title" => "CatNoir",
            ]
        ];

        return $context;
    }
}