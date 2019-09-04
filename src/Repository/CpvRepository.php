<?php

namespace App\Repository;

use App\Entity\Cpv;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Cpv|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cpv|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cpv[]    findAll()
 * @method Cpv[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CpvRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Cpv::class);
    }

    // /**
    //  * @return Cpv[] Returns an array of Cpv objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Cpv
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function orderByCode()
    {
        return $this->createQueryBuilder('c')
            ->orderBy('c.code', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
}
