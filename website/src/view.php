<?php

    // function renderHome($title, $tours) {
    //     global $twig;
    //     $template = $twig->load('home.html.twig');
    //     print ($template->render([
    //         'title' => $title,
    //         'tours' => $tours
    //     ]));
    // }

    // function renderReviews($title, $reviews) {
    //     global $twig;
    //     $template = $twig->load('reviews.html.twig');
    //     print ($template->render([
    //         'title' => $title,
    //         'reviews' => $reviews
    //     ]));
    // }

    //DRY render
    function renderPage($title,  $template_name, $data='')
    {
        global $twig;
        $template = $twig->load($template_name.'.html.twig');
        print ($template->render([
            'title' => $title,
            'data' => $data
        ]));
    }



    // function render404() {
    //     global $twig;
    //     $template = $twig->load('404.html.twig');
    //     print ($template->render());
    // }