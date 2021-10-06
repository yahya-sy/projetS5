<?php

namespace App\Repository;

use App\Entity\Pagedacceuil;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Pagedacceuil|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pagedacceuil|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pagedacceuil[]    findAll()
 * @method Pagedacceuil[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PagedacceuilRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pagedacceuil::class);
    }

    // /**
    //  * @return Pagedacceuil[] Returns an array of Pagedacceuil objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Pagedacceuil
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
