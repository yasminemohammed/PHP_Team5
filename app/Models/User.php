<?php
declare(strict_types=1);

namespace App\Models;

use App\App;
use PDO;

class User extends Model
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $username;
    private string $email;
    private ?string $ext;
    private ?string $avatar;
    private ?int $roomNo;


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }


    public function getLastName(): string
    {
        return $this->lastName;
    }


    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getUsername(): string
    {
        return $this->username;
    }


    public function setUsername(string $username): void
    {
        $this->username = $username;
    }


    public function getEmail(): string
    {
        return $this->email;
    }


    public function setEmail(string $email): void
    {
        $this->email = $email;
    }


    public function getExt(): ?string
    {
        return $this->ext ?? "";
    }

    public function setExt(string $ext): void
    {
        $this->ext = $ext;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar ?? "";
    }

    public function setAvatar(string $avatar): void
    {
        $this->avatar = $avatar;
    }


    public function getRoomNo(): ?int
    {
        return $this->roomNo ?? null;
    }


    public function setRoomNo(?int $roomNo): void
    {
        $this->roomNo = $roomNo;
    }


    public static function all(): array
    {
        $query = "SELECT id, firstName, lastName, username,email, ext, avatar, roomNo FROM users WHERE role = 0;";
        $stmt = App::db()->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getOneBy(string $attribute, $value): User|false
    {
        $query = "SELECT id, firstName, lastName, username,email, ext, avatar, roomNo FROM users WHERE $attribute = :$attribute;";
        $stmt = App::db()->prepare($query);
        $stmt->bindValue(":$attribute", $value);
        $stmt->execute();

        return $stmt->fetchObject(User::class, []);
    }


    public static function create(array $attributes): bool
    {
        $attributes['password'] = password_hash($attributes['password'], PASSWORD_BCRYPT);

        $query = "INSERT INTO `users` (firstName, lastName, email, username, `password`, avatar, ext, roomNo) VALUES(:firstName, :lastName, :email, :username, :password, :avatar, :ext, :roomNo)";

        $stmt = App::db()->prepare($query);

        foreach ($attributes as $key => $value) {
            $stmt->bindValue("$key", $value);
        }

        return $stmt->execute();
    }

    public static function update(array $attributes, string $userId): bool
    {

        $query = "UPDATE users SET ";

        foreach ($attributes as $key => $value) {
            $query .= "$key = :$key,";
        }

        $query = trim($query, ',') . " WHERE id = :id";


        $stmt = App::db()->prepare($query);

        foreach ($attributes as $key => $value) {
            if (is_int($value)) {
                $stmt->bindValue($key, $value, PDO::PARAM_INT);
                dump('int');
            } else
                $stmt->bindValue($key, $value);
        }

        $stmt->bindValue('id', $userId, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public static function deleteById(int $id): bool
    {
        $query = "DELETE FROM users WHERE id = :id LIMIT 1;";
        $stmt = App::db()->prepare($query);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);

        return $stmt->execute();
    }


}