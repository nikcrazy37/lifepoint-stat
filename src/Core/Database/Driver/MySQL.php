<?php

declare(strict_types=1);

namespace Lifepoint\Stat\Core\Database\Driver;

use Lifepoint\Stat\Core\Exception\NotFoundSelectException;
use PDO;

class MySQL extends DB
{
    /**
     * @param array $data
     * @return void
     */
    public function insert(array $data): void
    {
        $values = array_values($data);
        $keys = implode(",", array_keys($data));

        $prepareValues = $this->buildPrepareValues($data);

        $stmt = $this->client->prepare(
            "insert into $this->table ($keys) values ($prepareValues)"
        );

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute($values);
    }

    /**
     * @param array $param
     * @return array
     * @throws NotFoundSelectException
     */
    public function select(array $param): array
    {
        $this->prepareSelect($param);

        $stmt = $this->client->query($this->select, PDO::FETCH_ASSOC);
        $res = $stmt->fetchAll();

        if ($res === false) {
            throw new NotFoundSelectException();
        }

        return $res;
    }

    /**
     * @return PDO
     */
    protected function getConnection(): PDO
    {
        return (new \Lifepoint\Stat\Core\Database\Connection\MySQL())->pdo;
    }

    /**
     * @param $value
     * @return int|string
     */
    protected function prepareWhereValue($value)
    {
        if ((int)$value !== $value) {
            return "\"$value\"";
        }

        return $value;
    }

    /**
     * @param array $data
     * @return string
     */
    private function buildPrepareValues(array $data): string
    {
        $count = count($data);

        return "?" . str_repeat(", ?", $count - 1);
    }
}