<?php
require_once "LadyBugController.php";

class LadyBugInfoController extends LadyBugController {
    public $template = "LadyBug_info.twig";

    public function getContext() : array
    {
        $context = parent::getContext();
        return $context;
    }
}