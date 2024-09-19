<?php

    //DRY render
    function renderPage($title,  $template_name, $data='') {
        global $twig;
        $template = $twig->load($template_name.'.html.twig');
        print ($template->render([
            'title' => $title,
            'data' => $data
        ]));
    }
    function getTourById($tour_id){
        global $pdo;
        $stmt = $pdo->prepare("SELECT tours.*, price.value AS price_value, price.currency AS price_currency
                                FROM tours
                                JOIN price ON tours.id = price.tour_id
                                WHERE tours.id = ?");
        $stmt->execute([$tour_id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function deleteTourById($tour_id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM tours WHERE id = ?");
        $stmt->execute([$tour_id]);
        return $stmt->rowCount() > 0;
    }