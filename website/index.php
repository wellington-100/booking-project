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
    } else if ($page === 'test'){
        $price = new Money(20000, 'MDL');
        $tour = new Tour(14, 'Tour Number 3', $price);
        $tour->save();
    } else if ($page === 'delete') {
        $tour_id = $_GET['id'] ?? null;
        if ($tour_id) {
            if (deleteTourById($tour_id)) {
                renderPage("Tour with ID $tour_id was removed.", 'home');
            } else {
                renderPage("Tour with ID $tour_id not found.", 'home');
            }
        } else {
            renderPage("No tour ID provided for deletion.", 'home');
        }
    } else {
        var_dump($_GET);

        renderPage('THE PAGE YOU ARE LOOKING FOR WAS NOT FOUND', '404');
    }






    

    
