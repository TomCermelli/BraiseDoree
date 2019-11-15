<?php

namespace App\Repository;

use App\Entity\AllProduct;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method AllProduct|null find($id, $lockMode = null, $lockVersion = null)
 * @method AllProduct|null findOneBy(array $criteria, array $orderBy = null)
 * @method AllProduct[]    findAll()
 * @method AllProduct[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AllProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AllProduct::class);
    }

    // /**
    //  * @return AllProduct[] Returns an array of AllProduct objects
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
    public function findOneBySomeField($value): ?AllProduct
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
