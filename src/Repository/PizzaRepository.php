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
class PizzaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pizza::class);
    }

    public function findByRedPizza() //On recherche ici la valeur rouge qui est dans la colonne sauce
    {
        return $this->createQueryBuilder('p') //On crée un alias afin de pouvoir s'en reservir plus bas
            ->where('p.sauce like :val') //On cherche la colonne sauce ou on a pour valeur la variable 'val'
            ->setParameter('val', 'rouge') //La variable 'val' est égale à 'rouge'
            ->orderBy('p.name', 'ASC') //On trie ensuite par nom, par ordre croissant
            ->getQuery()
            ->getResult()
        ;
    }

    public function findByWhitePizza()  //on recherche ici la valeur blanche qui est dans la colonne sauce
    {
        return $this->createQueryBuilder('p') //On crée un alias afin de pouvoir s'en reservir plus bas
            ->where('p.sauce like :val') //On cherche la colonne sauce ou on a pour valeur la variable 'val'
            ->setParameter('val', 'blanche') //La variable 'val' est égale à 'blanche'
            ->orderBy('p.name', 'ASC') //On trie ensuite par nom, par ordre croissant
            ->getQuery()
            ->getResult()
        ;
    }

    public function findByOtherPizza() //on recherche ici la valeur "vide"" qui est dans la colonne sauce, c'est à dire autre que des pizza rouge ou blanche(exemple: pizza nutella)
    {
        return $this->createQueryBuilder('p') //On crée un alias afin de pouvoir s'en reservir plus bas
            ->where('p.sauce like :val') //On cherche la colonne sauce ou on a pour valeur la variable 'val'
            ->setParameter('val', ' ') //La variable 'val' est égale à ' ' c'est à dire les pizzas qui ne sont ni rouges ni blanches (Pizza nutella)
            ->orderBy('p.name', 'ASC') //On trie ensuite par nom, par ordre croissant
            ->getQuery()
            ->getResult()
        ;
    }

}
