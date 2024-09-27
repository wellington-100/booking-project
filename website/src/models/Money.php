<?php

namespace Student\Booking\models;
class Money extends Model {
    public int $value;
    public string $currency;

    public function __construct(int $value, string $currency){
        $this->value = $value;
        $this->currency = $currency;
    }

    public function save(int $tour_id): void{
        $sql = 'INSERT INTO price (value, currency, tour_id) VALUES (?, ?, ?)';
        $stmt = static::$pdo->prepare($sql);
        $stmt->execute([$this->value, $this->currency, $tour_id]);
    }
}