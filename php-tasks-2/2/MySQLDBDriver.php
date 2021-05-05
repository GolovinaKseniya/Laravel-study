<?php
include_once "../Exceptions/MYSQLDBException.php";

class MySQLDBDriver
{
    public PDO $connection;

    /**
     * MySQLBDDriver constructor.
     * @param array $config
     * @throws MYSQLDBException
     */
    public function __construct(array $config)
    {
//        try {
            $this->connection = new PDO($config['db'], $config['user'], $config['pass']);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
            var_dump($this->connection->errorCode());
//        } catch (PDOException $e) {
//            throw new MYSQLDBException('TEST');
//        }
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