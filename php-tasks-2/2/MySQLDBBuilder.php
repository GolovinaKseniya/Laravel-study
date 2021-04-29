<?php


class MySQLDBBuilder
{
    public array $query;
    protected string $table;
    protected $connection;

    public array $columns = [];

    public function __construct($connection, $table, $query = [])
    {
        $this->query = $query;
        $this->table = $table;
        $this->connection = $connection;
    }

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

    public function where($columnName = 0, $sign = 0, $findValue = 0)
    {
        if ($columnName === 0 && $sign === 0 && $findValue === 0) {
            return '';
        }

        $queryPart = sprintf("WHERE %s %s '%s'", $columnName, $sign, $findValue);
        $this->query['where'] = $queryPart;

        return $this;
    }

    public function orWhere($columnName = 0, $sign = 0, $findValue = 0)
    {
        if (isset($this->query['where']) && ($columnName !== 0 && $sign !== 0 && $findValue !== 0)) {
            $queryPart = sprintf(" OR %s %s '%s'", $columnName, $sign, $findValue);
            $this->query['orWhere'] .= $queryPart;
            return $this;
        } else {
            $this->query['orWhere'] = '';
            return $this;
        }

    }

    public function get()
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

        return $query;
//        return $this->connection->select($query);
    }

    public function insert($array)
    {

        $columns = implode(',', array_keys($array));

        $values = implode(',', array_values($array));
        $query = sprintf("INSERT INTO %s (%s) VALUES(%s)", $this->table, $columns, $values);

        var_dump($query);
    }

}