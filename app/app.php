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

    $app->get('/add_cd', function() use ($app) {
        return $app['twig']->render('add_cd.html.twig');
    });

    $app->post('/added', function() use ($app) {
        $cd = new CD($_POST['artist']);
        $cd->save();

        return $app['twig']->render('added_cd.html.twig');
    });

    return $app;
?>
