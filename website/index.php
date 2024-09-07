<?php

    require_once './src/bootstrap.php';

    $page = $_GET['page'] ?? 'home';

    if ($page === 'home') {
        $tours = getInfo('tours');
        $title = 'Our Fall Tours';
        renderPage($title, 'home', $tours);
    } else if ($page === 'reviews') {
        $reviews = getInfo('reviews');
        $title = 'What people think';
        renderPage($title, 'reviews', $reviews);
    } else {
        renderPage('THE PAGE YOU ARE LOOKING FOR WAS NOT FOUND', '404');
    }






    

    
