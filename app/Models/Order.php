<?php
declare(strict_types=1);

namespace App\Models;

use App\App;

class Order extends Model
{
    private int $id;
    private string $orderDate;
    private string $status;
    private int $amount;

    public static function create(array $attributes): bool
    {
        $query = "INSERT INTO `orders` (customer_id, amount, roomNo) VALUES(:customer_id, :amount, :roomNo)";

        $stmt = App::db()->prepare($query);

        foreach ($attributes as $key => $value) {
            $stmt->bindValue("$key", $value);
        }

        return $stmt->execute();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getOrderDate(): string
    {
        return $this->orderDate;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

}