<?php


class MySQLDBBuilder
{
    public array $query;
    protected string $table;
    protected MySQLDBDriver $connection;

    public array $columns = [];

    /**
     * MySQLDBBuilder constructor.
     * @param $connection
     * @param $table
     * @param array $query
     */
    public function __construct($connection, $table, $query = [])
    {
        $this->query = $query;
        $this->table = $table;
        $this->connection = $connection;
    }

    /**
     * @param $values
     * @return $this
     */
    public function select($values)
    {
        if (is_array($values)) {
            foreach ($values as $value) {
                array_push($this->columns, $value);
            }
        } else {
            array_push($this->columns, $values);
        }

        $this->query['select'] = "SELECT " . implode(',', $this->columns) . " FROM `" . $this->table . "`";

        return $this;
    }

    /**
     * @param int $columnName
     * @param int $sign
     * @param int $findValue
     * @return $this|string
     */
    public function where($columnName = 0, $sign = 0, $findValue = 0)
    {
        if ($columnName === 0 && $sign === 0 && $findValue === 0) {
            return '';
        }

        $queryPart = sprintf("WHERE %s %s '%s'", $columnName, $sign, $findValue);
        $this->query['where'] = $queryPart;

        return $this;
    }

    /**
     * @param int $columnName
     * @param int $sign
     * @param int $findValue
     * @return $this
     */
    public function orWhere($columnName = 0, $sign = 0, $findValue = 0)
    {
        if (isset($this->query['where']) && ($columnName !== 0 && $sign !== 0 && $findValue !== 0)) {
            $queryPart = sprintf(" OR %s %s '%s'", $columnName, $sign, $findValue);
            $this->query['orWhere'] = $queryPart;
            return $this;
        } else {
            $this->query['orWhere'] = '';
            return $this;
        }

    }

    /**
     * @return array
     */
    public function get(): array
    {
        $queryParts = ['select', 'where', 'orWhere'];
        $arrayKeys = array_keys($this->query);
        $query = "";

        if (!in_array('select', $arrayKeys)) {
            self::select();
            $query .= $this->query['select'] . " ";
        }

        foreach ($queryParts as $queryPart) {
            if (in_array($queryPart, $arrayKeys)) {
                $query .= $this->query[$queryPart] . " ";
            }
        }

        $query = trim($query);

        return $this->connection->select($query);
    }

    /**
     * @param $array
     * @return bool
     */
    public function insert($array): bool
    {
        $columns = implode(',', array_keys($array));
        $values = [];

        foreach (array_values($array) as $value) {
            array_push($values, "'" . $value . "'");
        }

        $values = implode(',', $values);

        $query = sprintf("INSERT INTO %s (%s) VALUES(%s)", $this->table, $columns, $values);

        return $this->connection->insert($query);
    }

    /**
     * @return false|int
     */
    public function delete()
    {
        $query = sprintf("DELETE FROM `%s` ", $this->table);

        if (isset($this->query['where'])) {
            $query .= $this->query['where'];
        }

        if (isset($this->query['orWhere'])) {
            $query .= $this->query['orWhere'];
        }

        return $this->connection->delete($query);
    }

    /**
     * @param array $array
     * @return false|int
     */
    public function update(array $array)
    {
        $query = sprintf("UPDATE `%s` SET ", $this->table);
        $i = 0;

        foreach ($array as $key => $value) {
            if(++$i === count($array)) {
                $query .= "$key='$value' ";
            } else if(count($array) > 1) {
                $query .= "$key='$value', ";
            }
        }

        if (isset($this->query['where'])) {
            $query .= $this->query['where'];
        }

        return $this->connection->update($query);
    }

}