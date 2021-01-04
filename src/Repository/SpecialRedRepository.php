<?php

namespace App\Repository;

use App\Entity\SpecialRed;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SpecialRed|null find($id, $lockMode = null, $lockVersion = null)
 * @method SpecialRed|null findOneBy(array $criteria, array $orderBy = null)
 * @method SpecialRed[]    findAll()
 * @method SpecialRed[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpecialRedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SpecialRed::class);
    }

    // /**
    //  * @return SpecialRed[] Returns an array of SpecialRed objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SpecialRed
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
