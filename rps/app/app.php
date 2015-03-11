<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/RockPaperScissors.php";

    $app = new Silex\Application();

    $app['debug']=TRUE;

    //twig stuff

    $app->get("/", function() use ($app) {
        return "Home";
    });

    return $app;

?>
