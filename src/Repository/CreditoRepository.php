<?php

namespace App\Repository;

use App\Entity\Credito;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Credito|null find($id, $lockMode = null, $lockVersion = null)
 * @method Credito|null findOneBy(array $criteria, array $orderBy = null)
 * @method Credito[]    findAll()
 * @method Credito[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CreditoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Credito::class);
    }

//    /**
//     * @return Credito[] Returns an array of Credito objects
//     */
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
    public function findOneBySomeField($value): ?Credito
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
