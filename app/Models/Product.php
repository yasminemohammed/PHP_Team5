<?php
declare(strict_types=1);

namespace App\Models;

use App\App;
use PDO;

class Product extends Model
{
    private int $id;
    private string $name;
    private string $featureImage;
    private string $category;
    private int $price;
    private bool $isAvailable;

    public static function all(): array
    {
        $query = "SELECT p.id, p.`name`, price, isAvailable, featureImage, c.`name` AS category FROM products AS p, categories AS c WHERE p.category_id = c.id;";
        $stmt = App::db()->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create(array $attributes): bool
    {
        $query = "INSERT INTO `products` (`name`, price, featureImage, category_id) VALUES(:name, :price, :featureImage, :category_id)";

        $stmt = App::db()->prepare($query);

        foreach ($attributes as $key => $value) {
            if (is_int($value))
                $stmt->bindValue("$key", $value, PDO::PARAM_INT);
            else
                $stmt->bindValue("$key", $value);
        }

        return $stmt->execute();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getFeatureImage(): string
    {
        return $this->featureImage;
    }

    public function setFeatureImage(string $featureImage): void
    {
        $this->featureImage = $featureImage;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    public function isAvailable(): bool
    {
        return $this->isAvailable;
    }

    public function setIsAvailable(bool $isAvailable): void
    {
        $this->isAvailable = $isAvailable;
    }
//
//    public static function update(array $attributes, string $userId): bool
//    {
//
//        $query = "UPDATE users SET ";
//
//        foreach ($attributes as $key => $value) {
//            $query .= "$key = :$key,";
//        }
//
//        $query = trim($query, ',') . " WHERE id = :id";
//
//
//        $stmt = App::db()->prepare($query);
//
//        foreach ($attributes as $key => $value) {
//            if (is_int($value)) {
//                $stmt->bindValue($key, $value, PDO::PARAM_INT);
//                dump('int');
//            } else
//                $stmt->bindValue($key, $value);
//        }
//
//        $stmt->bindValue('id', $userId, PDO::PARAM_INT);
//
//        return $stmt->execute();
//    }
//
//    public static function deleteById(int $id): bool
//    {
//        $query = "DELETE FROM users WHERE id = :id LIMIT 1;";
//        $stmt = App::db()->prepare($query);
//        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
//
//        return $stmt->execute();
//    }


}