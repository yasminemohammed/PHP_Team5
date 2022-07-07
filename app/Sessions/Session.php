<?php

namespace App\Sessions;

class Session implements SessionInterface
{

    private bool $isStarted;

    public function __construct()
    {
        $this->isStarted = false;
    }

    public function start(): void
    {
        if ($this->isStarted())
            return;

        session_start();
        $this->isStarted = true;
    }

    public function isStarted(): bool
    {
        $this->isStarted = session_status() === PHP_SESSION_ACTIVE;

        return $this->isStarted;
    }

    public function get(string $key, mixed $default = null): mixed
    {
        if ($this->has($key))
            return $_SESSION[$key];
        return $default;
    }

    public function has(string $key): bool
    {
        return array_key_exists($key, $_SESSION);
    }

    public function set(string $key, mixed $value): void
    {
        if ($this->isStarted())
            $_SESSION[$key] = $value;
    }

    public function destroy(): void
    {
        $this->clear();
        session_destroy();
    }

    public function clear(): void
    {
        session_unset();
    }

    public function regenerate(): void
    {
        session_regenerate_id(true);
    }


    public function remove(string $key): void
    {
        if ($this->has($key))
            unset($_SESSION[$key]);
    }
}