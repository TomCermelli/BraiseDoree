<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OtherProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    public function findByLasagne() //on recherche ici la valeur rouge qui est dans la colonne sauce
    {
        return $this->createQueryBuilder('p')
            ->where('p.type like :val')
            ->setParameter('val', 'Lasagne')
            ->orderBy('p.name', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    public function findByCiabatta()  //on recherche ici la valeur blanche qui est dans la colonne sauce
    {
        return $this->createQueryBuilder('p')
            ->where('p.type like :val')
            ->setParameter('val', 'Ciabatta')
            ->orderBy('p.name', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    public function findByDessert()
    //on recherche ici la valeur "vide"" qui est dans la colonne sauce, c'est à dire autre que des pizza rouge ou blanche( exemple : pizza nutella)
    {
        return $this->createQueryBuilder('p')
            ->where('p.type like :val')
            ->setParameter('val', 'Déssert')
            ->orderBy('p.name', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

}
