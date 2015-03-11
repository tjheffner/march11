<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/RockPaperScissors.php";

    session_start();
    if (empty($_SESSION['winner'])) {
        $_SESSION['winner'] = array();
    }


    $app = new Silex\Application();

    $app['debug']=TRUE;

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__."/../views"
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('start.twig');
    });

    $app->get("/p1select", function() use ($app) {
        return $app['twig']->render('p1select.twig');
    });

    $app->post("/p2select", function() use($app) {
        return $app['twig']->render('p2select.twig');
    });

    $app->post("/ready", function() use($app) {
        return $app['twig']->render('ready.twig');
    });

    $app->post("/results", function() use($app) {
        $results = new RockPaperScissors($_POST['input1'], $_POST['input2']);
        $results->save();

        return $app['twig']->render('results.twig', array('newwinner' => $results));
    });

    return $app;

?>
