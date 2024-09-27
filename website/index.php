<?php

    require_once './src/bootstrap.php';
    use \Student\Booking\models\Tour;
    use \Student\Booking\models\Money;

    $page = $_GET['page'] ?? 'home';

    if ($page === 'home') {
        $tours = Tour::getAll('tours');
        $title = 'Our Fall Tours';
        renderPage($title, 'home', $tours);

    } else if ($page === 'reviews') {
        $reviews = Tour::getAll('reviews');
        $title = 'What people think';
        renderPage($title, 'reviews', $reviews);
    } else if ($page === 'test'){
        $price = new Money(25000, 'MDL');
        $tour = new Tour(15, 'Tour Number 4', $price);
        $tour->save();
    } else if ($page === 'delete') {
        $tour_id = $_GET['id'] ?? null;

        if ($tour_id) {
            $tour = Tour::getOne((int) $tour_id);

            if ($tour) {
                if ($tour->delete()) {
                    renderPage("Tour with ID $tour_id was removed.", 'home');
                } else {
                    renderPage("Failed to delete Tour with ID $tour_id.", 'home');
                }
            } else {
                renderPage("Tour with ID $tour_id not found.", 'home');
            }
        } else {
            renderPage("No tour ID provided for deletion.", 'home');
        }
    } else {
        renderPage('THE PAGE YOU ARE LOOKING FOR WAS NOT FOUND', '404');
    }






    

    
