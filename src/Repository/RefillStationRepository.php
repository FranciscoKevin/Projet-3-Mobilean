<?php

namespace App\Repository;

use App\Entity\RefillStation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RefillStation|null find($id, $lockMode = null, $lockVersion = null)
 * @method RefillStation|null findOneBy(array $criteria, array $orderBy = null)
 * @method RefillStation[]    findAll()
 * @method RefillStation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RefillStationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RefillStation::class);
    }

    // /**
    //  * @return RefillStation[] Returns an array of RefillStation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RefillStation
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
