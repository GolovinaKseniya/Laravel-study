<?php
include_once "DriverInterface.php";


class DriverMemory implements DriverInterface
{
    static array $storage = [];
    /**
     * @param string $key
     * @param mixed $value
     */
    public function set(string $key, mixed $value): void
    {
        self::$storage[$key] = $value;
    }
    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key): mixed
    {
        return self::$storage[$key] ?? null;
    }
}