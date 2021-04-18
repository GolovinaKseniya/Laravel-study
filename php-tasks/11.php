<?php
/*
    Написать класс оболочку для массивов, который позволит работать с ними в ООП стиле.
    Методы: array_filter, array_map, count, values, toArray (alias for values());

    $collection = Collection::make($array);
    $newArray =
        $collection
            ->filter(function($elem) {retun time() & 2;})
            ->map(function($item) {retun $item['id']})
            ->values();
    $collection->count()
*/

$array = [1, 2, 3];

$collection = Collection::make($array);

var_dump($collection->count());

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
        return array_filter($this->array, $callback);
    }

    public function map($callback)
    {
        return array_map($callback, $this->array);
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
