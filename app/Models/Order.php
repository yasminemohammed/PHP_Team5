<?php
declare(strict_types=1);

namespace App\Models;

use App\App;
use PDO;

class Order extends Model
{
    private int $id;
    private string $orderDate;
    private string $status;
    private int $amount;
    private int $roomNo;
    private array $items;

    public function __construct()
    {
        parent::__construct();
        $this->items = [];
    }

    private function addItem(Item $item): void
    {
        $this->items[] = $item;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function addItems()
    {
        $query = "SELECT i.id, p.name, quantity, i.amount FROM items AS i, products AS p WHERE order_id = :order_id AND i.product_id = p.id;";

        $stmt = App::db()->prepare($query);
        $stmt->bindValue(":order_id", $this->id);
        $stmt->execute();
        $items = $stmt->fetchAll(PDO::FETCH_CLASS, Item::class);

        foreach ($items as $item)
            $this->addItem($item);
    }

    public function getId(): int
    {
        return $this->id;
    }


    public function getRoomNo(): int
    {
        return $this->roomNo;
    }


    public function setRoomNo(int $roomNo): void
    {
        $this->roomNo = $roomNo;
    }


    public function getOrderDate(): string
    {
        return $this->orderDate;
    }


    public function setOrderDate(string $orderDate): void
    {
        $this->orderDate = $orderDate;
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

    public static function create(array $attributes): bool
    {
        try {
            App::db()->beginTransaction();

            $query = "INSERT INTO `orders` (customer_id, amount, roomNo, notes) VALUES(:customer_id, :amount, :roomNo, :notes);";

            $stmt = App::db()->prepare($query);

            foreach ($attributes as $key => $value) {
                if ($key == 'products')
                    continue;
                $stmt->bindValue($key, $value);
            }

            $executed = $stmt->execute();

            $orderId = App::db()->lastInsertId();

            $query = "INSERT INTO `items` (product_id, amount, price_per_unit, quantity, order_id) VALUES(:product_id,:amount, :price_per_unit, :quantity, :order_id);";

            $stmt = App::db()->prepare($query);

            $executed = false;
            foreach ($attributes['products'] as $product) {
                $stmt->bindValue(":product_id", (int)$product['product_id'], PDO::PARAM_INT);
                $stmt->bindValue(":amount", (int)$product['amount'], PDO::PARAM_INT);
                $stmt->bindValue(":price_per_unit", (int)$product['price_per_unit'], PDO::PARAM_INT);
                $stmt->bindValue(":quantity", (int)$product['quantity'], PDO::PARAM_INT);

//            foreach ($product as $key => $value) {
////                $stmt->bindValue("$key", $value, PDO::PARAM_INT);
//                dump($key, $value);
//            }
//            $stmt->bindValue("$key", $value, PDO::PARAM_INT);

                $stmt->bindValue('order_id', $orderId, PDO::PARAM_INT);
                $executed = $stmt->execute();
            }
            App::db()->commit();
        } catch (\Exception $exception) {
            App::db()->rollBack();
        }

        return $executed;
    }

    public static function deleteById(int $id): bool
    {
        $query = "DELETE FROM orders WHERE id = :id LIMIT 1;";
        $stmt = App::db()->prepare($query);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);

        return $stmt->execute();
    }


}