<?php
declare(strict_types=1);

namespace App\Models;

class Item extends Model
{
    private int $id;
    private string $name;
    private int $quantity;
    private int $amount;
    private int $price;


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getName(): string
    {
        return $this->name;
    }


    public function setName(mixed $name): void
    {
        $this->name = $name;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(mixed $quantity): void
    {
        $this->quantity = $quantity;
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