<?php

function getInfo($table_name) {
    global $pdo;
    $allowed_tables = ['tours', 'reviews', 'price'];
    if (!in_array($table_name, $allowed_tables)) {
        throw new Exception('Invalid table name');
    }
    if ($table_name === 'tours') {
        $stmt = $pdo->query("SELECT tours.*, price.value AS price_value, price.currency AS price_currency
                             FROM tours
                             JOIN price ON tours.id = price.tour_id");
    } else {
        $stmt = $pdo->query("SELECT * FROM {$table_name}");
    }
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

// tour model - Active Record
// HW3:
//  1. add a column for price currency in tours table
//  2. create a separate class named Money (value, currency)
//  3. refactor Tour class - use Money price instead of int price
// HW4:
//  1. add: delete() - remove the db record

class Tour {
    private int $id;
    private string $title;
    private Money $price;
    private string $create_time;
    public function __construct(int $id, string $title, Money $price){
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->create_time = date('Y-m-d H:i:s');
    }
    
    public function save(){
        global $pdo;
        $sql = 'INSERT INTO tours (id, create_time, title) VALUES (?, ?, ?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$this->id, $this->create_time, $this->title]);
        $this->price->save($this->id);
        
    }
}

class Money {
    private int $value;
    private string $currency;

    public function __construct(int $value, string $currency) {
        $this->value = $value;
        $this->currency = $currency;
    }

    public function save(int $tour_id): void {
        global $pdo;
        $sql = 'INSERT INTO price (value, currency, tour_id) VALUES (?, ?, ?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$this->value, $this->currency, $tour_id]);
    }
}


// CLASS:
// - OOP:
//  - pros - method
//  - class/interface/inheritance/abstraction
//  - namespaces
//  - traits
//  - polymorphism
//  - encapsulation
//  - objects

//  - SOLID
//  - dp: ORM, singleton, observer, active record
//  - CRUD / BREAD
