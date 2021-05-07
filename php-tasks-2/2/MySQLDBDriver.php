<?php
namespace MySQLDBBuilder;
use PDO;


class MySQLDBDriver
{
    public PDO $connection;

    /**
     * MySQLBDDriver constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
            $this->connection = new PDO($config['db'], $config['user'], $config['pass']);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
    }

    /**
     * @param string $query
     * @return array
     */
    public function select(string $query)
    {
        return $this->connection->query($query)->fetchAll(PDO::FETCH_KEY_PAIR);
    }

    /**
     * @param string $query
     * @return bool
     */
    public function insert(string $query)
    {
        if ($this->connection->exec($query)) {
            return true;
        }
        return false;
    }

    /**
     * @param string $query
     * @return false|int
     */
    public function update(string $query)
    {
        return $this->connection->exec($query);
    }

    /**
     * @param string $query
     * @return false|int
     */
    public function delete(string $query)
    {
        return $this->connection->exec($query);
    }
}