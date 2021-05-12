<?php
namespace FileDB;

class FileDBBuilder implements DBBuilderInterface
{
    public $fd;
    public string $table;

    public array $conditions = [
        'and' => [],
        'or' => []
    ];

    public $selectValues;

    /**
     * FileDBBuilder constructor.
     * @param $fd
     */
    public function __construct($fd, $table)
    {
        $this->fd = $fd;
        $this->table = $table;
    }

    /**
     * @param string $values
     * @return $this
     */
    public function select($values = "*")
    {
        $this->selectValues = $values;
        return $this;
    }

    /**
     * @return array
     */
    public function get(): array
    {
        $selected = $this->selectValues ? $this->selectValues : "*";

        if (isset($this->conditions['and']) && isset($this->conditions['or'])) {
            return $this->fd
                ->file($this->table)
                ->find($this->conditions['and'], $this->conditions['or'])
                ->read($selected);
        } else {
            return $this->fd
                ->file($this->table)
                ->find([[1, '=', 1]])
                ->read($selected);
        }
    }

    /**
     * @param string $key
     * @param string $symbol
     * @param string $value
     * @return $this
     */
    public function where(string $key, string $symbol, string $value)
    {
        $tmp = [$key, $symbol, $value];
        array_push($this->conditions['and'], $tmp);
        return $this;
    }

    /**
     * @param string $key
     * @param string $symbol
     * @param string $value
     * @return $this
     */
    public function orWhere(string $key, string $symbol, string $value)
    {
        $tmp = [$key, $symbol, $value];
        array_push($this->conditions['or'], $tmp);
        return $this;
    }

    /**
     * @param array $array
     */
    public function insert($array)
    {
        $this->fd
            ->file($this->table)
            ->insert($array);
    }

    /**
     * @param array $array
     * @return mixed
     */
    public function update($array)
    {
        var_dump($this->conditions['and'], $this->conditions['or']);
        return $this->fd
            ->file($this->table)
            ->find($this->conditions['and'], $this->conditions['or'])
            ->update($array);
    }

    public function delete()
    {
        $this->fd
            ->file($this->table)
            ->find($this->conditions['and'], $this->conditions['or'])
            ->delete();
    }
}