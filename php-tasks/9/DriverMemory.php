<?php
include_once "DriverInterface.php";


class DriverMemory implements DriverInterface
{
    protected $link;

    private function __construct($server, $user, $pass, $table)
    {
        $this->link = new mysqli($server, $user, $pass, $table);

        if ($this->link->connect_error) {
            die('Could not connect: ' . $this->link->connect_error);
        }
    }

    public static function make($server, $user, $pass, $table)
    {
        return new static($server, $user, $pass, $table);
    }

    public function get($key)
    {
        return mysqli_query($this->link, "SELECT * FROM test WHERE `city=`".$key.";");
    }

    public function set($key, $value)
    {
        // TODO: Implement set() method.
    }
}