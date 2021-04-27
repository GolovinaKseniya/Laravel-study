<?php

interface DriverFactory
{
    public function createDriver(): DriverInterface;
}