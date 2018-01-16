<?php
/**
 * Created by PhpStorm.
 * User: zrose
 * Date: 1/12/2018
 * Time: 2:06 PM
 */
    ini_set("display_errors", 1);
    error_reporting(E_ALL);

    //Require the autoload file
    require_once("vendor/autoload.php");

    //Create an instance of the base class
    $f3 = Base::instance();

    //Set debug level
    $f3->set('DEBUG', 3);

    //Define a default route
    $f3->route('GET /', function() {
        $view = new View;
        echo $view->render('views/home.html');
    }
    );

    $f3->route('GET /page1', function() {
        $view = new View;
        echo $view->render('views/page1.html');
    }
    );

    $f3->route('GET /page2', function() {
        $view = new View;
        echo $view->render('views/page2.html');
    }
    );

    $f3->route('GET /jewelry/rings/toe-rings', function() {
        $template = new Template();
        echo $template->render('views/toe-rings.html');
    }
    );

    //Define a route using parameters
    $f3->route('GET /hello/@name', function($f3, $params) {
        $f3->set('name', $params['name']);
        $template = new Template();
        echo $template->render('views/hello.html');
    }
    );

    $f3->route('GET /hi/@first/@last', function($f3, $params) {
        $f3->set('first', $params['first']);
        $f3->set('last', $params['last']);
        $f3->set('message', 'Hi');

        $template = new Template();
        echo $template->render('views/hi.html');
    }
    );

    //Run fat-free
    $f3->run();