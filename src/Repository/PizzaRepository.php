<?php

namespace App\Repository;

use App\Entity\Pizza;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Pizza|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pizza|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pizza[]    findAll()
 * @method Pizza[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PizzaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pizza::class);
    }

    // /**
    //  * @return Pizza[] Returns an array of Pizza objects
    //  */
    
    public function findBySectionId($section)
    {
        $qb = $this->createQueryBuilder('p')
            ->where('p.section = :section')
            ->setParameter('section', $section);

        $query = $qb->getQuery();

        return $query->execute();
    }
    

    /*
    public function findOneBySomeField($value): ?Pizza
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
