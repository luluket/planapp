<?php

namespace App\Repository;

use App\Entity\PlanNabave;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PlanNabave|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlanNabave|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlanNabave[]    findAll()
 * @method PlanNabave[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlanNabaveRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PlanNabave::class);
    }

    // /**
    //  * @return PlanNabave[] Returns an array of PlanNabave objects
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
    public function findOneBySomeField($value): ?PlanNabave
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function sumUserAnnualExpenses($user_id,$godina_id)
    {
        return $this->createQueryBuilder('a')
            ->select('SUM(a.procijenjenaVrijednost) as sum')   //SELECT sum(procijenjena_vrijednost) as sum FROM plan_nabave
            ->andWhere('a.godina = :godina_id')
            ->setParameter('godina_id',$godina_id)
            ->andWhere('a.user = :user_id')
            ->setParameter('user_id',$user_id)
            ->getQuery()
            ->getSingleScalarResult();
    }
    public function readStatus($user_id,$godina_id)
    {
        return $this->createQueryBuilder('a')
            ->select('DISTINCT(a.status) as status')   //SELECT DISTINCT(status) as status FROM plan_nabave
            ->andWhere('a.godina = :godina_id')
            ->setParameter('godina_id',$godina_id)
            ->andWhere('a.user = :user_id')
            ->setParameter('user_id',$user_id)
            ->getQuery()
            ->getSingleScalarResult();
    }
    public function sumAnnualExpenses($godina_id)
    {
        return $this->createQueryBuilder('a')
            ->select('SUM(a.procijenjenaVrijednost) as sum')
            ->andWhere('a.godina = :godina_id')
            ->setParameter('godina_id',$godina_id)
            ->getQuery()
            ->getSingleScalarResult()
        ;
    }
    public function findYear($value)
    {
        return $this->createQueryBuilder('p')
            ->select('DISTINCT(p.godina) as godina')
            ->andWhere('p.status = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getSingleScalarResult()
        ;
    }

   
    public function findUsers($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.godina = :val')
            ->setParameter('val', $value)
            ->andWhere('p.status = :val2')
            ->setParameter('val2','objavljen')
            ->getQuery()
            ->getResult();
    }


}
