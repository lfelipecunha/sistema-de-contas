<?php

namespace App\Repository;

use App\Entity\Projecoes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Projecoes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Projecoes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Projecoes[]    findAll()
 * @method Projecoes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjecoesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Projecoes::class);
    }

    // /**
    //  * @return Projecoes[] Returns an array of Projecoes objects
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
    public function findOneBySomeField($value): ?Projecoes
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
