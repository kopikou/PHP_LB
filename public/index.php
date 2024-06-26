<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    require_once '../vendor/autoload.php';
    require_once "../framework/autoload.php";
    require_once "../controllers/MainController.php";
    require_once "../controllers/ObjectController.php";
    require_once "../controllers/SearchController.php";
    require_once "../controllers/HeroesCreateController.php";
    require_once "../controllers/HeroesDeleteController.php";
    require_once "../controllers/HeroesUpdateController.php";
    require_once "../controllers/TypesCreateController.php";
    require_once "../middlewares/LoginRequiredMiddleware.php";
    require_once "../controllers/SetWelcomeController.php";
    require_once "../controllers/LoginController.php";
    require_once "../controllers/LogoutController.php";
    //require_once "../controllers/ImageController.php";
    //require_once "../controllers/InfoController.php";

    require_once "../controllers/Controller404.php";

    $loader = new \Twig\Loader\FilesystemLoader('../views');
    $twig = new \Twig\Environment($loader, [
        "debug" => true 
    ]);
    $twig->addExtension(new \Twig\Extension\DebugExtension()); 

    //$url = $_SERVER["REQUEST_URI"];

    $title = "";
    $template = "";
    $context = [];
    //$controller = new Controller404($twig); 

    $pdo = new PDO("mysql:host=localhost;dbname=lb_cn;charset=utf8", "root", "");

    session_set_cookie_params(60 * 60 * 10);
    session_start();

    $router = new Router($twig, $pdo);
    $router->add("/", MainController::class)
        ->middleware(new LoginRequiredMiddleware());
    $router->add("/heroes/(?P<id>\d+)", ObjectController::class)
        ->middleware(new LoginRequiredMiddleware());
    $router->add("/search", SearchController::class)
        ->middleware(new LoginRequiredMiddleware());
    $router->add("/heroes/create", HeroesCreateController::class)
        ->middleware(new LoginRequiredMiddleware());
    //$router->add("/heroes/delete", HeroesDeleteController::class);
    $router->add("/heroes/(?P<id>\d+)/delete", HeroesDeleteController::class)
        ->middleware(new LoginRequiredMiddleware());
    $router->add("/heroes/(?P<id>\d+)/edit", HeroesUpdateController::class)
        ->middleware(new LoginRequiredMiddleware());
    $router->add("/heroes/createtype", TypesCreateController::class)
        ->middleware(new LoginRequiredMiddleware());
    $router->add("/set-welcome/", SetWelcomeController::class);
    $router->add("/login", LoginController::class);
    $router->add("/logout", LogoutController::class);



    $router->get_or_default(Controller404::class);
