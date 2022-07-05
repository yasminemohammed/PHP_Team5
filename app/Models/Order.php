<?php
declare(strict_types=1);

namespace App\Models;

use App\App;
<<<<<<< HEAD
use PDO;
=======
>>>>>>> [edit-files] write routes for user orders.

class Order extends Model
{
    private int $id;
    private string $orderDate;
    private string $status;
    private int $amount;
<<<<<<< HEAD
    private int $roomNo;
    private array $items;

    public function __construct()
    {
        parent::__construct();
        $this->items = [];
    }

    public static function all(): array|bool
    {
        $query = "SELECT o.id, order_date, roomNo, o.amount, os.order_status AS status
FROM orders AS o, order_status AS os 
WHERE o.id = os.order_id;";

        $stmt = App::db()->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, Order::class);
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
        $query = "SELECT i.id, p.name, quantity, i.amount, price_per_unit as price
FROM items AS i, products AS p WHERE order_id = :order_id AND i.product_id = p.id;";

        $stmt = App::db()->prepare($query);
        $stmt->bindValue(":order_id", $this->id);
        $stmt->execute();
        $items = $stmt->fetchAll(PDO::FETCH_CLASS, Item::class);

        foreach ($items as $item)
            $this->addItem($item);
=======

    public static function create(array $attributes): bool
    {
        $query = "INSERT INTO `orders` (customer_id, amount, roomNo) VALUES(:customer_id, :amount, :roomNo)";

        $stmt = App::db()->prepare($query);

        foreach ($attributes as $key => $value) {
            $stmt->bindValue("$key", $value);
        }

        return $stmt->execute();
>>>>>>> [edit-files] write routes for user orders.
    }

    public function getId(): int
    {
        return $this->id;
    }

<<<<<<< HEAD

    public function getRoomNo(): int
    {
        return $this->roomNo;
    }


    public function setRoomNo(int $roomNo): void
    {
        $this->roomNo = $roomNo;
    }


=======
>>>>>>> [edit-files] write routes for user orders.
    public function getOrderDate(): string
    {
        return $this->orderDate;
    }

<<<<<<< HEAD

    public function setOrderDate(string $orderDate): void
    {
        $this->orderDate = $orderDate;
    }


=======
>>>>>>> [edit-files] write routes for user orders.
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

<<<<<<< HEAD
//    public function all(int $id = null): array {
//
//        $query = "SELECT o.id, order_date, roomNo, o.amount, os.order_status AS status
//FROM orders AS o, order_status AS os
//WHERE customer_id = :customer_id AND o.id = os.order_id;";
//
//        $stmt = App::db()->prepare($query);
//        $stmt->bindValue(":customer_id", $this->id);
//        $stmt->execute();
//        $orders = $stmt->fetchAll(PDO::FETCH_CLASS, Order::class);
//
//        foreach ($orders as $order) {
//            $order->addItems();
//        }
//
//        return $orders;
//    }

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


=======
>>>>>>> [edit-files] write routes for user orders.
}