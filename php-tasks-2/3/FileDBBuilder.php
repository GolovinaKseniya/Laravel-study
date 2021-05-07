<?php
namespace FileDB;

class FileDBBuilder implements DBBuilderInterface
{
    public $fd;

    public array $conditions = [
        'and' => [],
        'or' => []
    ];

    public array $selectValues;

    public function __construct($fd)
    {
        $this->fd = $fd;
    }

    public function select($selectValues = "*")
    {
        $this->selectValues = $selectValues;
        return $this;
    }

    public function get(): array
    {
        $selected = $this->selectValues ? $this->selectValues : "*";

        if (isset($this->conditions['and']) && isset($this->conditions['or'])) {
            return $this->fd
                ->file('test')
                ->find($this->conditions['and'], $this->conditions['or'])
                ->read($selected);
        } else {
            return $this->fd
                ->file('test')
                ->find([[1, '=', 1]])
                ->read($selected);
        }
    }

    public function where($key, $symbol, $value): static
    {
        $tmp = [$key, $symbol, $value];
        array_push($this->conditions['and'], $tmp);
        return $this;
    }

    public function orWhere($key, $symbol, $value)
    {
        $tmp = [$key, $symbol, $value];
        array_push($this->conditions['or'], $tmp);
        return $this;
    }

    public function insert($array)
    {
        $this->fd
            ->file('test')
            ->insert($array);
    }

    public function update($array)
    {
        var_dump($this->conditions['and'], $this->conditions['or']);
        return $this->fd
            ->file('test')
            ->find($this->conditions['and'], $this->conditions['or'])
            ->update($array);
    }

    public function delete()
    {
        $this->fd
            ->file('test')
            ->find($this->conditions['and'], $this->conditions['or'])
            ->delete();
    }
}