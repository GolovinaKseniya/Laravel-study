<?php


class CacheDriver
{
    protected static array $drivers = [];

    /**
     * @param string $type
     * @return DriverInterface
     * @throws MYSQLDBException
     */
    public static function factory(string $type): DriverInterface
    {
        switch ($type) {
            case "memory":
                return new MemoryCacheDriver(self::$drivers['drivers'][$type]);
            case "filesystem":
                return new FileCacheDriver(self::$drivers['drivers'][$type]);
            case "database":
                return new DatabaseCacheDriver(self::$drivers['drivers'][$type]);
        }

        throw new MYSQLDBException("Cannot get driver: $type");
    }

    public static function load($configPath)
    {
        self::$drivers = include $configPath;
    }

}