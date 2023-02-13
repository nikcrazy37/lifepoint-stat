<?php

declare(strict_types=1);

namespace Lifepoint\Stat\Core\Connection;

use ClickHouseDB\Client;
use Lifepoint\Stat\Core\Config;

class ClickHouse
{
    public Client $client;

    public function __construct()
    {
        $this->client = new Client(
            array(
                'host' => Config::getOption("CLICKHOUSE_HOST"),
                'port' => Config::getOption("CLICKHOUSE_PORT"),
                'username' => Config::getOption("CLICKHOUSE_USERNAME"),
                'password' => Config::getOption("CLICKHOUSE_PASSWORD")
            )
        );
    }
}