<?php

namespace App\Repository;

use App\Entity\Lancamentos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Lancamentos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lancamentos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lancamentos[]    findAll()
 * @method Lancamentos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LancamentosRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Lancamentos::class);
    }

    // /**
    //  * @return Lancamentos[] Returns an array of Lancamentos objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Lancamentos
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
