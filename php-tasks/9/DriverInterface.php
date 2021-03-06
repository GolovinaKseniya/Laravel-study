<?php


interface DriverInterface
{
    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key): mixed;

    /**
     * @param string $key
     * @param mixed $value
     */
    public function set(string $key, mixed $value): void;
}