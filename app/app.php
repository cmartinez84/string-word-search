<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/RepeatCounter.php";

    date_default_timezone_set('America/Los_Angeles');
    // session_start();
    // if (empty($_SESSION['list_of_albums'])) {
    //     $_SESSION['list_of_albums'] = array();
    // }
    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('home.html.twig');
    });

    $app->post("/result", function() use ($app) {
        $newRepeatCounter = new RepeatCounter;
        $newRepeatCounter->CountRepeats($_POST['input_phrase'], $_POST['input_word']);
        return $app['twig']->render('home.html.twig', array('result' => $newRepeatCounter));
    });
    return $app;
?>
Contact GitHub API Training Shop Blog About
