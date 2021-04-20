<?php
include_once "DriverInterface.php";


class DriverDB implements DriverInterface
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
        $hashKey = md5($key);
        $stmt = $this->link->prepare("SELECT value FROM cache WHERE uuid=?");
        $stmt->bind_param('s', $hashKey);

        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc()['value'];


        if ($result !== false) {
            return unserialize($result);
        } else {
            return "Not found";
        }
    }

    public function set($key, $value)
    {
        $hashKey = md5($key);
        $serializeValue = serialize($value);

        $stmt = $this->link->prepare("INSERT INTO cache (uuid, value) VALUES (?, ?) ON DUPLICATE KEY UPDATE value = ? ");
        $stmt->bind_param('sss', $hashKey, $serializeValue, $serializeValue);

        return $stmt->execute();
    }
}

