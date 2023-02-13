<?php

declare(strict_types=1);

namespace Lifepoint\Stat\Model\Query;

class Where
{
    private string $param;
    private string $operator;
    private string $value;

    /**
     * @param string $param
     * @param string $operator
     * @param $value
     */
    public function __construct(string $param, string $operator, $value)
    {
        $this->param = $param;
        $this->operator = $operator;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getParam(): string
    {
        return $this->param;
    }

    /**
     * @param string $param
     * @return Where
     */
    public function setParam(string $param): Where
    {
        $this->param = $param;

        return $this;
    }

    /**
     * @return string
     */
    public function getOperator(): string
    {
        return $this->operator;
    }

    /**
     * @param string $operator
     * @return Where
     */
    public function setOperator(string $operator): Where
    {
        $this->operator = $operator;

        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param $value
     * @return Where
     */
    public function setValue($value): Where
    {
        $this->value = $value;

        return $this;
    }
}