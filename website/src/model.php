<?php

// HW2: try to aply DRY to the model function
// function getAllTours () {
//     global $pdo;
//     $stmt = $pdo->query('SELECT * FROM tours');
//     $tours =  $stmt->fetchAll(PDO::FETCH_ASSOC);
//     return $tours;
// }
// function getAllReviews () {
//     global $pdo;
//     $stmt = $pdo->query('SELECT * FROM reviews');
//     $reviews =  $stmt->fetchAll(PDO::FETCH_ASSOC);
//     return $reviews;
// }

function getInfo($table_name){
    global $pdo;

    $allowed_tables = ['tours', 'reviews'];
    if (!in_array($table_name, $allowed_tables)) {
        throw new Exception('Invalid table name');
    }
    $stmt = $pdo->query("SELECT * FROM {$table_name}");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}