<?php

namespace App\Repository;

use App\Entity\WhitePizza;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method WhitePizza|null find($id, $lockMode = null, $lockVersion = null)
 * @method WhitePizza|null findOneBy(array $criteria, array $orderBy = null)
 * @method WhitePizza[]    findAll()
 * @method WhitePizza[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WhitePizzaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WhitePizza::class);
    }

    // /**
    //  * @return WhitePizza[] Returns an array of WhitePizza objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?WhitePizza
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
