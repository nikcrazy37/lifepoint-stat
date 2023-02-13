<?php

declare(strict_types=1);

namespace Lifepoint\Stat\Controller\Repository;

use Lifepoint\Stat\Model\Query\Where;

abstract class Repository
{
    protected string $table;
    protected string $select;
    protected $client;

    /**
     * @param string $table
     */
    public function __construct(string $table)
    {
        $this->table = $table;

        $this->client = $this->getConnection();
    }

    /**
     * @param array $data
     * @return void
     */
    abstract function insert(array $data): void;

    /**
     * @param array $param
     * @return array
     */
    abstract function select(array $param): array;

    /**
     * $queryPart can be "where"...
     * @param array $param
     * @return void
     */
    protected function prepareSelect(array $param): void
    {
        $this->select = "select * from $this->table";

        array_walk($param, function ($value, $queryPart) {
            $this->{$queryPart}($value);
        });
    }

    /**
     * @param array $param
     * @return void
     */
    protected function where(array $param): void
    {
        $this->select .= " where ";

        array_walk($param, function (Where $where, $key) {
            if ($key !== 0) {
                $this->select .= " and ";
            }

            $this->select .= $where->getParam() . " ";
            $this->select .= $where->getOperator() . " ";

            // TODO: Handling all type. Now support -> date type
            $this->select .= $this->prepareWhereValue($where->getValue());
        });
    }
}