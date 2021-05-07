<?php
namespace FileDB;

interface DBBuilderInterface
{

    public function get();

    public function where(string $key, string $symbol, string $value);

    public function orWhere();

    public function select();
    public function insert();
    public function update();
    public function delete();
}