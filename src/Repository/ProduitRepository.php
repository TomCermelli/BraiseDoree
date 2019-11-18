<?php

namespace App\Repository;

use App\Entity\Pizza;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Pizza|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pizza|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pizza[]    findAll()
 * @method Pizza[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pizza::class);
    }


    public function findByRedPizza() //on recherche ici la valeur rouge qui est dans la colonne sauce
    {
        return $this->createQueryBuilder('p')
            ->where('p.sauce like :val')
            ->setParameter('val', 'rouge')
            ->orderBy('p.name', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    public function findByWhitePizza()  //on recherche ici la valeur blanche qui est dans la colonne sauce
    {
        return $this->createQueryBuilder('p')
            ->where('p.sauce like :val')
            ->setParameter('val', 'blanche')
            ->orderBy('p.name', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    public function findByOtherPizza() //on recherche ici la valeur "vide"" qui est dans la colonne sauce, c'est à dire autre que des pizza rouge ou blanche(exemple: pizza nutella)
    {
        return $this->createQueryBuilder('p')
            ->where('p.sauce like :val')
            ->setParameter('val', ' ')
            ->orderBy('p.name', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

}
