<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/RockPaperScissors.php";

    $app = new Silex\Application();

    $app['debug']=TRUE;

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__."/../views"
    ));

    $app->get("/", function() use ($app) {

    //we want 3 buttons here, 1 for each player 1 input

        return "Home";
    });

    return $app;

?>
