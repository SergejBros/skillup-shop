<?php

namespace App\Repository;

use App\Entity\AttrubuteValue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AttrubuteValue|null find($id, $lockMode = null, $lockVersion = null)
 * @method AttrubuteValue|null findOneBy(array $criteria, array $orderBy = null)
 * @method AttrubuteValue[]    findAll()
 * @method AttrubuteValue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AttrubuteValueRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AttrubuteValue::class);
    }

    // /**
    //  * @return AttrubuteValue[] Returns an array of AttrubuteValue objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AttrubuteValue
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
