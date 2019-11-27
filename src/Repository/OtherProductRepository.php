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

    public function findByLasagne() //On recherche ici la valeur rouge qui est dans la colonne sauce
    {
        return $this->createQueryBuilder('p') //On crée un alias afin de pouvoir s'en reservir plus bas
            ->where('p.type like :val') //On cherche la colonne type ou on a pour valeur la variable 'val'
            ->setParameter('val', 'Lasagne') //La variable 'val' est égale à 'Lasagne'
            ->orderBy('p.name', 'ASC') //On trie ensuite par nom, par ordre croissant
            ->getQuery()
            ->getResult()
        ;
    }

    public function findByCiabatta()  //on recherche ici la valeur blanche qui est dans la colonne sauce
    {
        return $this->createQueryBuilder('p') //On crée un alias afin de pouvoir s'en reservir plus bas
            ->where('p.type like :val') //On cherche la colonne type ou on a pour valeur la variable 'val'
            ->setParameter('val', 'Ciabatta') //La variable 'val' est égale à 'Ciabatta'
            ->orderBy('p.name', 'ASC') //On trie ensuite par nom, par ordre croissant
            ->getQuery()
            ->getResult()
        ;
    }

    public function findByDessert()
    //On recherche ici la valeur "vide" qui est dans la colonne sauce, c'est à dire autre que des pizza rouge ou blanche( exemple : pizza nutella)
    {
        return $this->createQueryBuilder('p') //On crée un alias afin de pouvoir s'en reservir plus bas
            ->where('p.type like :val') //On cherche la colonne type ou on a pour valeur la variable 'val'
            ->setParameter('val', 'Déssert') //La variable 'val' est égale à 'Déssert'
            ->orderBy('p.name', 'ASC') //On trie ensuite par nom, par ordre croissant
            ->getQuery()
            ->getResult()
        ;
    }

}
