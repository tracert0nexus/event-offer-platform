<?php

namespace App\Repository;

use App\Entity\Reference;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Reference>
 */
class ReferenceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reference::class);
    }

    public function findPublicWithMedia(int $limit = 6) {
        return $this->createQueryBuilder("r")
            ->where("r.isPublic = :p")->setParameter("p", true)
            ->leftJoin("r.media", 'm')->addSelect('m')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }
}
