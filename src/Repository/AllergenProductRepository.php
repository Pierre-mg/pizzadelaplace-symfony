<?php

namespace App\Repository;

use App\Entity\AllergenProduct;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AllergenProduct|null find($id, $lockMode = null, $lockVersion = null)
 * @method AllergenProduct|null findOneBy(array $criteria, array $orderBy = null)
 * @method AllergenProduct[]    findAll()
 * @method AllergenProduct[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AllergenProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AllergenProduct::class);
    }

    // /**
    //  * @return AllergenProduct[] Returns an array of AllergenProduct objects
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
    public function findOneBySomeField($value): ?AllergenProduct
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
