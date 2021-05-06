<?php


class FileDBBuilder
{
    public $fd;
    public function __construct($fd)
    {
        $this->fd = $fd;
    }

    public function get($value = "*") {
        $this->fd->find();
    }

    public function where()
    {

    }

    public function orWhere()
    {

    }

    public function select()
    {

    }

    public function insert()
    {

    }
}