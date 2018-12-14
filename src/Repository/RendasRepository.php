<?php

namespace App\Repository;

use App\Entity\Rendas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Rendas|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rendas|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rendas[]    findAll()
 * @method Rendas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RendasRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Rendas::class);
    }

    // /**
    //  * @return Rendas[] Returns an array of Rendas objects
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
    public function findOneBySomeField($value): ?Rendas
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
