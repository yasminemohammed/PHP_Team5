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
    private int $role;
    private array $orders;


    public function __construct(array $attributes)
    {
        $this->id = $attributes['id'];
        $this->firstName = $attributes['firstName'];
        $this->lastName = $attributes['lastName'];
        $this->username = $attributes['username'];
        $this->email = $attributes['email'];
        $this->ext = $attributes['ext'];
        $this->avatar = $attributes['avatar'];
        $this->roomNo = $attributes['roomNo'];
        $this->role = $attributes['role'];

        $this->orders = [];
    }


    public function addOrder(Order $order): self
    {
        $this->orders[] = $order;
        return $this;
    }

    public function getOrders(): array
    {
        return $this->orders;
    }

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
        return $this->ext ?? "3456";
    }

    public function setExt(string $ext): void
    {
        $this->ext = $ext;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar ?? "default.png";
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

    public function isAdmin(): bool
    {
        return !!$this->role;
    }


    public function orders(bool $checked = false, string $startDate = null, string $endDate = null): array
    {

        $query = "SELECT o.id, order_date, roomNo, o.amount, os.order_status AS status
FROM orders AS o, order_status AS os 
WHERE customer_id = :customer_id AND o.id = os.order_id";

        if ($checked)
            $query .= " AND os.order_status = 'done'";

        if (isset($startDate)) {
            $query .= " AND Date(order_date) >= :order_date";
        }

        if (isset($endDate)) {
            $query .= " AND Date(order_date) <= :order_date2";
        }
        $query .= ";";

        $stmt = App::db()->prepare($query);
        $stmt->bindValue(":customer_id", $this->id);

        if (isset($startDate))
            $stmt->bindValue(":order_date", $startDate);
        if (isset($endDate))
            $stmt->bindValue(":order_date2", $endDate);

        $stmt->execute();
        $orders = $stmt->fetchAll(PDO::FETCH_CLASS, Order::class);

        foreach ($orders as $order) {
            $order->addItems();
        }

        $this->orders = $orders;

        return $this->orders;
    }

    public static function all(string $with = null): array
    {
        $query = "SELECT id, firstName, lastName, username,email, ext, avatar, roomNo, role FROM users WHERE role = 0;";
        $stmt = App::db()->prepare($query);
        $stmt->execute();

        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $usersArrObjects = [];
        foreach ($users as $user) {
            $user = new User($user);

            if (isset($with) && $with == Order::class)
                $user->orders();

            $usersArrObjects[] = $user;
        }

        return $usersArrObjects;
    }

    public static function getOneBy(string $attribute, $value): User|false
    {
        $query = "SELECT id, firstName, lastName, username,email, ext, avatar, roomNo, role FROM users WHERE $attribute = :$attribute;";
        $stmt = App::db()->prepare($query);
        $stmt->bindValue(":$attribute", $value);
        $stmt->execute();
        $user = $stmt->fetch();

        return new self($user);
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

    public static function authenticate(string $username, string $password): bool|self
    {
        $query = "SELECT * FROM users WHERE username = :username LIMIT 1;";
        $stmt = App::db()->prepare($query);
        $stmt->bindValue(":username", $username);

        $stmt->execute();
        $user = $stmt->fetch();

        if (!password_verify($password, $user['password']))
            return false;

        return new self($user);
    }

}