<?php

declare(strict_types=1);

namespace Lifepoint\Stat\Core\Install;

use Lifepoint\Stat\Core\Database\Connection\MySQL;

class ECoachMySQL
{
    private \PDO $client;

    public function __construct()
    {
        $this->client = (new MySQL())->pdo;
    }

    public function install()
    {
        $this->installTable();
    }

    private function installTable()
    {
        $this->client->query("create table `visit_ecoach` (
  `id` int(11) not null auto_increment,
  `dateCreate` datetime default now(),
  `userId` int(11) not null,
  `userName` varchar(255) not null,
  `login` varchar(255) not null, 
  `bankId` int(11) not null,
  `bankName` varchar(255) not null,
  `departmentId` int(11) not null,
  `departmentName` varchar(255) not null,
  `cityId` int(11) not null,
  `cityName` varchar(255) not null,
  `ip` varchar(255) not null,
  `geo` varchar(255) not null,
  `url` varchar(255) not null,
  `userAgent` varchar(255) not null,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB");
    }

    public function uninstall()
    {
        $this->uninstallTable();
    }

    private function uninstallTable()
    {
        $this->client->query("drop table visit_ecoach");
    }
}