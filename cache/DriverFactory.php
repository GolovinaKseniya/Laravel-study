<?php

interface DriverFactory
{
    public function createDriver(array $config): DriverInterface;
}