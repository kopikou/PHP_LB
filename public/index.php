<?php 
    require_once '../vendor/autoload.php';
    require_once "../controllers/MainController.php";
    require_once "../controllers/LadyBugController.php";
    require_once "../controllers/LadyBugImageController.php";
    require_once "../controllers/LadyBugInfoController.php";
    require_once "../controllers/CatNoirController.php";
    require_once "../controllers/CatNoirImageController.php";
    require_once "../controllers/CatNoirInfoController.php";
    require_once "../controllers/Controller404.php";

    $loader = new \Twig\Loader\FilesystemLoader('../views');
    $twig = new \Twig\Environment($loader);

    $url = $_SERVER["REQUEST_URI"];

    $title = "";
    $template = "";
    $context = [];
    $controller = new Controller404($twig); 

    if ($url == "/") {
        $controller = new MainController($twig);
    } elseif (preg_match("#^/LadyBug/image#", $url)){
        $controller = new LadyBugImageController($twig);
    }elseif (preg_match("#^/LadyBug/info#", $url)){
        $controller = new LadyBugInfoController($twig);
    }elseif (preg_match("#^/LadyBug#", $url)) {
        $controller = new LadyBugController($twig);   
    }elseif (preg_match("#^/CatNoir/image#", $url)){
        $controller = new CatNoirImageController($twig);    
    }elseif (preg_match("#^/CatNoir/info#", $url)){
        $controller = new CatNoirInfoController($twig);
    }elseif (preg_match("#^/CatNoir#", $url)) {
        $controller = new CatNoirController($twig);
    } 

    if ($controller) {
        $controller->get();
    }
