<?php

namespace Student\Booking\models;

class Tour extends Model{
    public int $id;
    public string $title;
    public Money $price;
    public string $create_time;
    public function __construct(int $id, string $title, Money $price){
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->create_time = date('Y-m-d H:i:s');
    }
    
    public function save(){
        $sql = 'INSERT INTO tours (id, create_time, title) VALUES (?, ?, ?)';
        $stmt = static::$pdo->prepare($sql);
        $stmt->execute([$this->id, $this->create_time, $this->title]);
        $this->id = static::$pdo->lastInsertId();
        $this->price->save($this->id);
    }
    public function delete(){
        $stmt = static::$pdo->prepare("DELETE FROM price WHERE tour_id = ?");
        $stmt->execute([$this->id]);

        $stmt = static::$pdo->prepare("DELETE FROM tours WHERE id = ?");
        return $stmt->execute([$this->id]);
    }


    public static function getAll($table_name){
        $allowed_tables = ['tours', 'reviews', 'price'];
        if (!in_array($table_name, $allowed_tables)) {
            throw new \Exception('Invalid table name');
        }
        if ($table_name === 'tours') {
            $stmt = static::$pdo->query("SELECT tours.*, price.value AS price_value, price.currency AS price_currency
                             FROM tours
                             JOIN price ON tours.id = price.tour_id");
        
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $tours = [];
        foreach ($data as $row) {
            $price = new Money($row['price_value'], $row['price_currency']);
            $tours[] = new Tour($row['id'], $row['title'], $price);
        }
        return $tours;
        } else {
            $stmt = static::$pdo->query("SELECT * FROM {$table_name}");
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
        
    }

    public static function  getOne(int $id) {
        $stmt = static::$pdo->prepare("SELECT tours.*, price.value AS price_value, price.currency AS price_currency
                                FROM tours
                                JOIN price ON tours.id = price.tour_id
                                WHERE tours.id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($row) {
            $price = new Money($row['price_value'], $row['price_currency']);
            return new Tour($row['id'], $row['title'], $price);
        }
        return null;
    }
}
