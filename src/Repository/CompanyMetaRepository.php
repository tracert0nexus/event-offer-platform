<?php

namespace App\Repository;

use App\Entity\CompanyMeta;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CompanyMeta>
 */
class CompanyMetaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CompanyMeta::class);
    }

    public function getCompanyMeta() {
        return $this->findOneBy([], ['id' => 'DESC']);
    }
}
