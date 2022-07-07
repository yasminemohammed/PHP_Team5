<?php

namespace App\Models;

use App\App;
use PDO;

class Category
{
    private int $id;
    private string $name;

    public static function all(): array
    {

        $query = "SELECT * FROM categories;";

        $stmt = App::db()->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, Category::class);
        return $stmt->fetchAll();
    }

    public static function create(array $attributes): bool
    {
        $query = "INSERT INTO `categories` (`name`) VALUES(:name);";

        $stmt = App::db()->prepare($query);

        $stmt->bindValue("name", $attributes['name']);

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


}