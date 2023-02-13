<?php

declare(strict_types=1);

namespace Lifepoint\Stat\Controller;

use Lifepoint\Stat\Controller\Repository\Repository;
use Lifepoint\Stat\Model\ECoach;

class ECoachController
{
    private Repository $repository;

    /**
     * @param Repository $repository
     */
    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param ECoach $view
     * @return void
     */
    public function add(ECoach $view): void
    {
        $this->repository->insert(
            array(
                "userId" => $view->getUserId(),
                "userName" => $view->getUserName(),
                "bankId" => $view->getBankId(),
                "bankName" => $view->getBankName(),
                "departmentId" => $view->getDepartmentId(),
                "departmentName" => $view->getDepartmentName(),
            )
        );
    }

    /**
     * @param array $param
     * @return array
     */
    public function get(array $param): array
    {
        $collection = array();

        $views = $this->repository->select($param);

        array_walk($views, function ($view) use (&$collection) {
            $collection[] = new ECoach($view);
        });

        return $collection;
    }
}