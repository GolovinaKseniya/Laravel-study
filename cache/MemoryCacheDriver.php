<?php


class MemoryCacheDriver implements DriverInterface
{
    /**
     * @var array
     */
    static array $storage = [];

    /**
     * @var array
     */
    protected array $config = [];

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key): mixed
    {
        return self::$storage[$key] ?? null;
    }

    /**
     * @param string $key
     * @param mixed $value
     */
    public function set(string $key, mixed $value): void
    {
        self::$storage[$key] = $value;
    }

    public function loadConfig(array $config)
    {
        // INFO: Not need
    }
}