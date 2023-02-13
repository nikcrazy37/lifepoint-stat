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
        $configPath = self::CONFIG_PATH;
        $config = parse_ini_file($configPath);

        return $config[$key];
    }
}