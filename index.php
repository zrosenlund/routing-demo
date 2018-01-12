<?php
/**
 * Created by PhpStorm.
 * User: zrose
 * Date: 1/12/2018
 * Time: 2:06 PM
 */
    //Require the autoload file
    require_once("vendor/autoload.php");

    //Create an instance of the base class
    $f3 = Base::instance();

    //Define a default route
    $f3->route('GET /', function() {
        $view = new View;
        echo $view->render('views/home.html');
    }
    );

    //Run fat-free
    $f3->run();