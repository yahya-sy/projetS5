<?php

namespace App\Repository;

use App\Entity\Offreemploi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Offreemploi|null find($id, $lockMode = null, $lockVersion = null)
 * @method Offreemploi|null findOneBy(array $criteria, array $orderBy = null)
 * @method Offreemploi[]    findAll()
 * @method Offreemploi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OffreemploiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Offreemploi::class);
    }

    // /**
    //  * @return Offreemploi[] Returns an array of Offreemploi objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Offreemploi
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
