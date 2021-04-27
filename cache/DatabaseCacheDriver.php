<?php
include_once "DriverInterface.php";


class DatabaseCacheDriver implements DriverInterface
{
    /**
     * @var array
     */
    protected array $config = [];

    /**
     * @param array $config
     */
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
        $hashKey = md5($key);
        $stmt = $this->loadConfig($this->config)->prepare("SELECT value FROM cache WHERE uuid=?");
        $stmt->bind_param('s', $hashKey);

        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc()['value'];


        if ($result !== false) {
            return unserialize($result);
        } else {
            return "Not found";
        }
    }

    /**
     * @param string $key
     * @param mixed $value
     */
    public function set(string $key, $value): void
    {
        $hashKey = md5($key);
        $serializeValue = serialize($value);

        $stmt = $this->loadConfig($this->config)->prepare("INSERT INTO cache (uuid, value) VALUES (?, ?) ON DUPLICATE KEY UPDATE value = ? ");
        $stmt->bind_param('sss', $hashKey, $serializeValue, $serializeValue);

        $stmt->execute();
    }

    /**
     * @param array $config
     * @return mysqli
     */
    public function loadConfig(array $config): mysqli
    {
        try {
            $this->config['database'] = $config['database'];
            $this->config['host'] = $config['host'];
            $this->config['port'] = $config['port'];
            $this->config['user'] = $config['user'];
            $this->config['password'] = $config['password'];

            return new mysqli(
                $this->config['host'],
                $this->config['user'],
                $this->config['password'],
                $this->config['database'],
                $this->config['port']

            );

        } catch (\Exception $exception) {
            throw CacheDriverConfigException($exception->getMessage());
        }
    }
}