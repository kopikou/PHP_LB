<?php
require_once "LadyBugController.php";

class LadyBugImageController extends LadyBugController {
    public $template = "object_image.twig";

    public function getContext() : array
    {
        $context = parent::getContext();
        $context['image'] = "/img/ladybug.webp";
        return $context;
    }
}