<?php
namespace FileDB;

interface DBBuilderInterface
{
    public function get();

    /**
     * @param string $key
     * @param string $symbol
     * @param string $value
     * @return mixed
     */
    public function where(string $key, string $symbol, string $value);

    /**
     * @param string $key
     * @param string $symbol
     * @param string $value
     * @return mixed
     */
    public function orWhere(string $key, string $symbol, string $value);

    /**
     * @param mixed $values
     * @return mixed
     */
    public function select(mixed $values);

    /**
     * @param array $array
     * @return mixed
     */
    public function insert(array $array);

    /**
     * @param array $array
     * @return mixed
     */
    public function update(array $array);

    public function delete();
}