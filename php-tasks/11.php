<?php
/*
    Написать класс оболочку для массивов, который позволит работать с ними в ООП стиле.
    Методы: array_filter, array_map, count, values, toArray (alias for values());

    $collection = Collection::make($array);
    $newArray =
        $collection
            ->filter(function($elem) {retun time() & MySQLDBBuilder;})
            ->map(function($item) {retun $item['id']})
            ->values();
    $collection->count()
*/

$array = [1, 2, 3];

$collection = Collection::make($array);

var_dump($collection->map(function($item) {return $item * 2; })->count());

class Collection
{
    public $array;

    private function __construct($array)
    {
        $this->array = $array;
    }

    public static function make($array)
    {
        return new static($array);
    }

    public function filter($callback)
    {
        $this->array = array_filter($this->array, $callback);
        return $this;
    }

    public function map($callback)
    {

        return self::make(array_map($callback, $this->array));
    }

    public function values()
    {
        return $this->array;
    }

    public function count()
    {
        return sizeof($this->array);
    }
}
