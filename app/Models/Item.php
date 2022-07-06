<?php
declare(strict_types=1);

namespace App\Models;

class Item extends Model
{
    private int $id;
    private string $name;
    private int $quantity;
    private int $amount;
<<<<<<< HEAD
    private int $price;


=======


//    public function __construct(array $attributes)
//    {
//        $this->name = $attributes['name'];
//        $this->quantity = $attributes['quantity'];
//        $this->price = $attributes['price'];
//    }

>>>>>>> [add-feature] authorized user can make and read his orders.
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

<<<<<<< HEAD
    public function getPrice(): int
    {
        return $this->price;
    }

=======
>>>>>>> [add-feature] authorized user can make and read his orders.
    public function getName(): string
    {
        return $this->name;
    }


    public function setName(mixed $name): void
    {
        $this->name = $name;
    }

<<<<<<< HEAD
    public function getQuantity(): int
=======
    public function getQuantity(): mixed
>>>>>>> [add-feature] authorized user can make and read his orders.
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