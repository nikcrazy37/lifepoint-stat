<?php

declare(strict_types=1);

namespace Lifepoint\Stat\Core\Install;

use ClickHouseDB\Client;
use Lifepoint\Stat\Core\Database\Connection\ClickHouse;

class ECoachCH
{
    private Client $client;

    public function __construct()
    {
        $this->client = (new ClickHouse())->client;
    }

    public function install()
    {
        $this->installDB();
        $this->installTable();
    }

    private function installDB()
    {
        $this->client->write("create database lifepoint");
    }

    private function installTable()
    {
        $this->client->write("create table if not exists lifepoint.visit_ecoach (
    dateCreate DateTime default now(),
    userId UInt32,
    userName String,
    bankId UInt32,
    bankName String,
    departmentId UInt32,
    departmentName String,
    cityId UInt32,
    cityName String,
    ip String,
    geo String,
    url String,
    userAgent String,
)
ENGINE = MergeTree()
order by dateCreate
");
    }

    public function uninstall()
    {
        $this->uninstallTable();
        $this->uninstallDB();
    }

    private function uninstallDB()
    {
        $this->client->write("drop database lifepoint");
    }

    private function uninstallTable()
    {
        $this->client->write("drop table lifepoint.visit_ecoach");
    }
}