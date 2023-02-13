<?php

declare(strict_types=1);

namespace Lifepoint\Stat\Core\Install;

use Lifepoint\Stat\Core\Connection\MySQL;

class ECoachMySQL
{
    private \PDO $client;

    public function __construct()
    {
        $this->client = (new MySQL())->pdo;
    }

    public function install()
    {
        $this->client->query("create table `views_ecoach` (
  `id` int(11) not null auto_increment,
  `dateCreate` date default now(),
  `userId` int(11) not null,
  `userName` varchar(255) not null,
  `bankId` int(11) not null,
  `bankName` varchar(255) not null,
  `departmentId` int(11) not null,
  `departmentName` varchar(255) not null,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB");
    }

    public function uninstall()
    {
        $this->client->query("drop table views_ecoach");
    }
}