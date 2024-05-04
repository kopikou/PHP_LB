<?php
require_once "BaseController.php";

class TwigBaseController extends BaseController {
    public $title = "";
    public $template = "";
    protected \Twig\Environment $twig;

    //public function __construct($twig)
    //{
        //$this->twig = $twig;
    //}
    public function getTemplate($context){
        return $this->template;
    }
    
    public function setTwig($twig) {
        $this->twig = $twig;
    }

    public function getContext() : array
    {
        $context = parent::getContext();
        //$context['title'] = $this->title;

        return $context;
    }
    
    public function get(array $context) {
        // $context = $this->getContext();
        //echo $this->twig->render($this->template, $this->getContext());
        echo $this->twig->render($this->getTemplate($context), $context);
    }
}