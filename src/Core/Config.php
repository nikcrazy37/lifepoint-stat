<?php

declare(strict_types=1);

namespace Lifepoint\Stat\Core;

class Config
{
    const CONFIG_PATH = __DIR__ . "/../../config.ini";

    /**
     * @param $key
     * @return mixed
     */
    public static function getOption($key)
    {
        $configPath = self::getPath();

        $config = parse_ini_file($configPath);

        return $config[$key];
    }

    /**
     * @return string
     */
    public static function getPath(): string
    {
        $configPath = $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/config/stat.config.ini";
        if (!file_exists($configPath)) {
            $configPath = self::CONFIG_PATH;
        }

        return $configPath;
    }
}