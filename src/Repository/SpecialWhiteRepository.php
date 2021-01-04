<?php

namespace App\Repository;

use App\Entity\SpecialWhite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SpecialWhite|null find($id, $lockMode = null, $lockVersion = null)
 * @method SpecialWhite|null findOneBy(array $criteria, array $orderBy = null)
 * @method SpecialWhite[]    findAll()
 * @method SpecialWhite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpecialWhiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SpecialWhite::class);
    }

    // /**
    //  * @return SpecialWhite[] Returns an array of SpecialWhite objects
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
    public function findOneBySomeField($value): ?SpecialWhite
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
