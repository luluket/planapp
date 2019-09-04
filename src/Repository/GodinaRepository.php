<?php

namespace App\Repository;

use App\Entity\Godina;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Godina|null find($id, $lockMode = null, $lockVersion = null)
 * @method Godina|null findOneBy(array $criteria, array $orderBy = null)
 * @method Godina[]    findAll()
 * @method Godina[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GodinaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Godina::class);
    }

    // /**
    //  * @return Godina[] Returns an array of Godina objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Godina
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
