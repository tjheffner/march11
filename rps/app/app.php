<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/RockPaperScissors.php";

/*
Even though the winner array is not used in the rest of the code,
the if statement is needed for the score counter to recognize that
you've played at least one game.
*/
    session_start();
    if (empty($_SESSION['winner'])) {
        $_SESSION['winner'] = array();
        $_SESSION['p1count'] = 0;
        $_SESSION['p2count'] = 0;
     }

    $app = new Silex\Application();

    $app['debug'] = true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__."/../views"
    ));

    $app->get("/", function() use ($app) {
        RockPaperScissors::deleteAll();
        return $app['twig']->render('start.twig');
    });

    $app->get("/p1select", function() use ($app) {

        return $app['twig']->render('p1select.twig');
    });

/*
We carry the player1 and array_key variables through twig to the next page.
Otherwise, twig thinks these variables are undefined, and redefining a random array_key
on the second page would mean the players have a chance of playing a different game.

The array_key must be carried through all the way, because the results page uses it for the description.
*/
    $app->post("/p2select", function() use($app) {
        $player1 = $_POST['player1'];
        $array_key = $_POST['array_key'];
        return $app['twig']->render('p2select.twig', array('player1' => $player1, 'array_key' => $array_key));
    });

    $app->post("/ready", function() use($app) {
        return $app['twig']->render('ready.twig', array('player1' => $_POST['player1'], 'player2' => $_POST['player2'], 'array_key' => $_POST['array_key']));
    });

    $app->post("/results", function() use($app) {
        $results = new RockPaperScissors;
        $winner = $results->shoot($_POST['player1'], $_POST['player2']);
        $results->save();
        return $app['twig']->render('results.twig', array('newwinner' => $winner, 'p1wins' => $_SESSION['p1count'], 'p2wins' => $_SESSION['p2count'], 'array_key' => $_POST['array_key']));
    });

    return $app;

?>
