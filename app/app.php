<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/RepeatCounter.php";
    require_once __DIR__."/../src/Data.php";

    ini_set('display_errors', 'On');

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
        $newData = new Data;
        $input = $newData->getData($_POST['input_phrase']);
        $newRepeatCounter->CountRepeats($input, $_POST['input_word']);
        return $app['twig']->render('home.html.twig', array('result' => $newRepeatCounter, 'phraseDisplay'=> $newData->phraseDisplay));
    });

    $app->post("/countAll", function() use ($app) {
        $newRepeatCounter = new RepeatCounter;
        $newData = new Data;
        $input_phrase = $newData->getData($_POST['phrase']);
        $result = $newRepeatCounter->countAllWords($input_phrase);
        return $app['twig']->render('countAll.html.twig', array('result' => $result));
    });

    return $app;
?>
