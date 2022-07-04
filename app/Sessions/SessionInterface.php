<?php

namespace App\Sessions;

interface SessionInterface
{
    public function has(string $key): bool;

    public function get(string $key, mixed $default = null): mixed;

    public function set(string $key, mixed $value): void;

    public function clear(): void;

    public function remove(string $key): void;
}