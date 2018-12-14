<?php

namespace App\Repository;

use App\Entity\Contas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Contas|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contas|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contas[]    findAll()
 * @method Contas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContasRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Contas::class);
    }

    // /**
    //  * @return Contas[] Returns an array of Contas objects
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
    public function findOneBySomeField($value): ?Contas
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
