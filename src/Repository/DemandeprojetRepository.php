<?php

namespace App\Repository;

use App\Entity\Demandeprojet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Demandeprojet|null find($id, $lockMode = null, $lockVersion = null)
 * @method Demandeprojet|null findOneBy(array $criteria, array $orderBy = null)
 * @method Demandeprojet[]    findAll()
 * @method Demandeprojet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DemandeprojetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Demandeprojet::class);
    }

    // /**
    //  * @return Demandeprojet[] Returns an array of Demandeprojet objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Demandeprojet
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
