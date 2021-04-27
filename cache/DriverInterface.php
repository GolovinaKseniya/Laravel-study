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
     * @param $value
     */
    public function set(string $key, $value): void;
}