<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/CD.php";

    session_start();

    if (empty($_SESSION['list_of_artists'])) {
        $_SESSION['list_of_artists'] = array();
    }

    $app = new Silex\Application();
    $app['debug'] = false;
    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__."/../views"));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('home.html.twig', array('artists' => CD::getAll()));
    });

    return $app;
?>
