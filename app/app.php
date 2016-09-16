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
        $newDayOfWeek = new DayOfWeek;
        $day = $newDayOfWeek->getDayOfWeek($_POST['month'], $_POST['date'], $_POST['year']);
        return $app['twig']->render('home.html.twig', array('day' => $day));
    });
    return $app;
?>
Contact GitHub API Training Shop Blog About
