<?php

    require_once __DIR__ . '/../vendor/autoload.php';


    use Student\Booking\models\Model;
    // initialization + configutation of main app parts
    require_once './src/view.php';

    //TWIG CONFIGURATION
    $loader = new \Twig\Loader\FilesystemLoader('./templates');
    $twig = new \Twig\Environment($loader, [
        // 'cache' => '/path/to/compilation_cache',
    ]);

    // // DB INIT + CONFIG
    Model::$pdo = new PDO("mysql:host=booking_mariadb;dbname=booking;port=3306", "booking", "booking");