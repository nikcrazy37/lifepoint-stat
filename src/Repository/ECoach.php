<?php

declare(strict_types=1);

namespace Lifepoint\Stat\Repository;

use Lifepoint\Stat\Core\Config;
use Lifepoint\Stat\Core\Database\Driver\DB;
use Lifepoint\Stat\Entity\ECoach as Entity;
use Lifepoint\Stat\Core\Database\Driver\ClickHouse;
use Lifepoint\Stat\Core\Database\Driver\MySQL;
use Lifepoint\Stat\Entity\Query\Where;

class ECoach
{
    private DB $db;

    public function __construct()
    {
        $driver = Config::getOption("DRIVER");
        $this->db = new $driver(Config::getOption("TABLE_ECOACH"));
    }

    /**
     * @param Entity $entity
     * @return void
     */
    public function add(Entity $entity): void
    {
        $this->db->insert(
            array(
                "userId" => $entity->getUserId(),
                "userName" => $entity->getUserName(),
                "login" => $entity->getLogin(),
                "bankId" => $entity->getBankId(),
                "bankName" => $entity->getBankName(),
                "departmentId" => $entity->getDepartmentId(),
                "departmentName" => $entity->getDepartmentName(),
                "cityId" => $entity->getCityId(),
                "cityName" => $entity->getCityName(),
                "ip" => $entity->getIp(),
                "geo" => $entity->getGeo(),
                "url" => $entity->getUrl(),
                "userAgent" => $entity->getUserAgent(),
            )
        );
    }

    public function getById(string $id): Entity
    {
        return new Entity(
            current($this->db->select(
                array(
                    "where" => array(
                        new Where("id", "=", $id)
                    )
                )
            ))
        );
    }

    /**
     * @param array $param
     * @return array[ECoach]
     */
    public function getList(array $param): array
    {
        $collection = array();

        $entities = $this->db->select($param);

        array_walk($entities, function ($entity) use (&$collection) {
            $collection[] = new Entity($entity);
        });

        return $collection;
    }
}