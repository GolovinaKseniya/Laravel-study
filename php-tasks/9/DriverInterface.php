<?php


interface DriverInterface
{
    public function get($key);

    public function set($key, $value);
}