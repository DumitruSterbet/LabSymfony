<?php

namespace App\Repository;

use App\Entity\ProdDesc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProdDesc|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProdDesc|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProdDesc[]    findAll()
 * @method ProdDesc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProdDescRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProdDesc::class);
    }

    // /**
    //  * @return ProdDesc[] Returns an array of ProdDesc objects
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
    public function findOneBySomeField($value): ?ProdDesc
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
