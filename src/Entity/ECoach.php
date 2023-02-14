<?php

//declare(strict_types=1);

namespace Lifepoint\Stat\Entity;

class ECoach
{
    private string $id;
    private string $dateCreate;
    private int $userId;
    private string $userName;
    private int $bankId;
    private string $bankName;
    private int $departmentId;
    private string $departmentName;

    /**
     * @param array $param
     */
    public function __construct(array $param)
    {
        foreach ($param as $key => $value) {
            $this->{$key} = $value;
        }
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return ECoach
     */
    public function setId(string $id): ECoach
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getDateCreate(): string
    {
        return $this->dateCreate;
    }

    /**
     * @param string $dateCreate
     * @return ECoach
     */
    public function setDateCreate(string $dateCreate): ECoach
    {
        $this->dateCreate = $dateCreate;

        return $this;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return ECoach
     */
    public function setUserId(int $userId): ECoach
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     * @return ECoach
     */
    public function setUserName(string $userName): ECoach
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * @return int
     */
    public function getBankId(): int
    {
        return $this->bankId;
    }

    /**
     * @param int $bankId
     * @return ECoach
     */
    public function setBankId(int $bankId): ECoach
    {
        $this->bankId = $bankId;

        return $this;
    }

    /**
     * @return string
     */
    public function getBankName(): string
    {
        return $this->bankName;
    }

    /**
     * @param string $bankName
     * @return ECoach
     */
    public function setBankName(string $bankName): ECoach
    {
        $this->bankName = $bankName;

        return $this;
    }

    /**
     * @return int
     */
    public function getDepartmentId(): int
    {
        return $this->departmentId;
    }

    /**
     * @param int $departmentId
     * @return ECoach
     */
    public function setDepartmentId(int $departmentId): ECoach
    {
        $this->departmentId = $departmentId;

        return $this;
    }

    /**
     * @return string
     */
    public function getDepartmentName(): string
    {
        return $this->departmentName;
    }

    /**
     * @param string $departmentName
     * @return ECoach
     */
    public function setDepartmentName(string $departmentName): ECoach
    {
        $this->departmentName = $departmentName;

        return $this;
    }
}