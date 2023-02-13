<?php

declare(strict_types=1);

namespace Lifepoint\Stat\Controller\Repository;

use ClickHouseDB\Client;
use Lifepoint\Stat\Core\Exception\NotFoundSelectException;

class ClickHouse extends Repository
{
    /**
     * @param array $data
     * @return void
     */
    public function insert(array $data): void
    {
        $this->client->insert(
            $this->table,
            array(array_values($data)),
            array_keys($data),
        );
    }

    /**
     * @param array $param
     * @return array
     * @throws NotFoundSelectException
     */
    public function select(array $param): array
    {
        $this->prepareSelect($param);

        $res = $this->client
            ->select($this->select)
            ->rows();

        if (empty($res)) {
            throw new NotFoundSelectException();
        }

        return $res;
    }

    /**
     * @return Client
     */
    protected function getConnection(): Client
    {
        return (new \Lifepoint\Stat\Core\Connection\ClickHouse())->client;
    }

    /**
     * @param $value
     * @return int|string
     */
    protected function prepareWhereValue($value)
    {
        if ($timestamp = strtotime($value)) {
            return $timestamp;
        }

        if ((int)$value !== $value) {
            return "\"$value\"";
        }

        return $value;
    }
}