<?php

    // for class autoloading (do not remove!)
    require_once './vendor/autoload.php';

    //TWIG CONFIGURATION
    $loader = new \Twig\Loader\FilesystemLoader('./templates');

    $twig = new \Twig\Environment($loader, [
        // 'cache' => '/path/to/compilation_cache',
    ]);

    $title = 'Booking Agency';

    // connect to db fetch data - mysqli
    $pdo = new PDO("mysql:host=booking_mariadb;dbname=booking;port=3306", "booking", "booking");
    $stmt = $pdo->query('SELECT * FROM tours');

    $tours = [];

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $tours[] = $row;
    }





    $template = $twig->load('home.html.twig');
    print($template->render([
        'title' => $title,
        'tours' => $tours
    ]));