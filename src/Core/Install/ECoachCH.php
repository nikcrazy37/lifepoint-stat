<?php

declare(strict_types=1);

namespace Lifepoint\Stat\Core\Install;

use ClickHouseDB\Client;
use Lifepoint\Stat\Core\Connection\ClickHouse;

class ECoachCH
{
    private Client $client;

    public function __construct()
    {
        $this->client = (new ClickHouse())->client;
    }

    public function install()
    {
        $this->client->write("create database lifepoint");

        $this->client->write("create table if not exists lifepoint.views_ecoach (
    dateCreate DateTime default now(),
    userId UInt32,
    userName String,
    bankId UInt32,
    bankName String,
    departmentId UInt32,
    departmentName String
)
ENGINE = MergeTree()
order by dateCreate
");

        $database = $this->client->showDatabases();
        $table = $this->client->showCreateTable("lifepoint.views_ecoach");
        print_r($database);
        print_r($table);
    }

    public function uninstall()
    {
        $this->client->write("drop table lifepoint.views_ecoach");
    }
}