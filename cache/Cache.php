<?php
include_once 'DriverInterface.php';
include_once 'FileCacheDriver.php';
include_once 'DatabaseCacheDriver.php';
include_once'CacheDriver.php';

class Cache
{
    protected DriverInterface $driver;

    protected function __construct(DriverInterface $driver)
    {
        $this->driver = $driver;
    }

    /**
     * @param string $type
     * @return Cache
     */
    public static function storage(string $type): Cache
    {
        return new static(CacheDriver::factory($type));
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key): mixed
    {
        return $this->driver->get($key);
    }

    /**
     * @param string $key
     * @param $value
     */
    public function set(string $key, $value): void
    {
        $this->driver->set($key, $value);
    }
}