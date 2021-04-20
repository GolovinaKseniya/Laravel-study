<?php
include_once "DriverInterface.php";


class DriverFile implements DriverInterface
{
    public function get($key)
    {
        return json_decode(file_get_contents($this->getDirname($key)));
    }

    public function set($key, $value)
    {
        file_put_contents($this->getDirname($key), json_encode($value));
    }

    private function getDirname($key) {
        $uploadDir = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'storage';

        @mkdir($uploadDir);
        return $uploadDir . DIRECTORY_SEPARATOR . md5($key);
    }
}