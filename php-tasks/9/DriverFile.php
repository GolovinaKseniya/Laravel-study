<?php
include_once "DriverInterface.php";


class DriverFile implements DriverInterface
{
    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key): mixed
    {
        return json_decode(file_get_contents($this->getDirname($key)));
    }

    /**
     * @param string $key
     * @param mixed $value
     */
    public function set(string $key, mixed $value): void
    {
        file_put_contents($this->getDirname($key), json_encode($value));
    }

    /**
     * @param string $key
     * @return string
     */
    private function getDirname(string $key): string
    {
        $uploadDir = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'storage';

        @mkdir($uploadDir);
        return $uploadDir . DIRECTORY_SEPARATOR . md5($key);
    }
}