<?php

namespace App\Repository;

use App\Entity\Vehicle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Vehicle|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vehicle|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vehicle[]    findAll()
 * @method Vehicle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VehicleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vehicle::class);
    }

    /**
    * @return Vehicle[] Returns an array of Vehicle objects
    */
    public function findByParticularVehicle(): array
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.type = :ParticularVehicle')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
    * @return Vehicle[] Returns an array of Vehicle objects
    */
    public function findByUtilityVehicle(): array
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.type = :UtilityVehicle')
            ->getQuery()
            ->getResult()
        ;
    }


    /*
    public function findOneBySomeField($value): ?Vehicle
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
