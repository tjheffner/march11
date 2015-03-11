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
        $player1 = $_POST['player1'];
        return $app['twig']->render('p2select.twig', array('player1' => $player1));
    });

    $app->post("/ready", function() use($app) {
        return $app['twig']->render('ready.twig', array('player1' => $_POST['player1'], 'player2' => $_POST['player2']));
    });

    $app->post("/results", function() use($app) {
        $results = new RockPaperScissors;
        $winner = $results->shoot($_POST['player1'], $_POST['player2']);
        $results->save();
        return $app['twig']->render('results.twig', array('newwinner' => $winner));
    });

    return $app;

?>
