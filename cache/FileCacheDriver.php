<?php
include_once "DriverInterface.php";


class FileCacheDriver implements DriverInterface
{
    /**
     * @var array
     */
    protected array $config = [];

    public function __construct(array $config)
    {
        $this->loadConfig($config);
    }

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
     * @param $value
     */
    public function set(string $key, $value): void
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

    /**
     * @param array $config
     * @throws CacheDriverConfigException
     */
    public function loadConfig(array $config)
    {
        try {
            $this->config['path'] = $config['path'];
        } catch (\Exception $exception) {
            throw new CacheDriverConfigException($exception->getMessage());
        }
    }
}