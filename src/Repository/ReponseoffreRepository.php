<?php

namespace App\Repository;

use App\Entity\Reponseoffre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Reponseoffre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reponseoffre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reponseoffre[]    findAll()
 * @method Reponseoffre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReponseoffreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reponseoffre::class);
    }

    // /**
    //  * @return Reponseoffre[] Returns an array of Reponseoffre objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Reponseoffre
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
