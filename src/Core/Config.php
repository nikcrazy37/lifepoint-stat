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

        $content = file_get_contents($configPath);
        $content = explode("\n", $content);

        $file = array();
        array_walk($content, function ($row) use (&$file) {
            $exp = array_map("trim", explode("=", $row));
            $file[$exp[0]] = $exp[1];
        });

        return $file[$key];
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