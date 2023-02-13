<?php

declare(strict_types=1);

namespace Lifepoint\Stat\Core\Connection;

use Lifepoint\Stat\Core\Config;
use PDO;

class MySQL
{
    public PDO $pdo;

    public function __construct()
    {
        try {
            $host = Config::getOption("MYSQL_HOST");
            $port = Config::getOption("MYSQL_PORT");
            $database = Config::getOption("MYSQL_DATABASE");
            $options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            );

            $this->pdo = new PDO(
                "mysql:host=$host;port=$port;dbname=$database;charset=utf8",
                Config::getOption("MYSQL_USERNAME"),
                Config::getOption("MYSQL_PASSWORD"),
                $options
            );
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}