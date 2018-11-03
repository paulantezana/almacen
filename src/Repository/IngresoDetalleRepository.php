<?php

namespace App\Repository;

use App\Entity\IngresoDetalle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method IngresoDetalle|null find($id, $lockMode = null, $lockVersion = null)
 * @method IngresoDetalle|null findOneBy(array $criteria, array $orderBy = null)
 * @method IngresoDetalle[]    findAll()
 * @method IngresoDetalle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IngresoDetalleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, IngresoDetalle::class);
    }

//    /**
//     * @return IngresoDetalle[] Returns an array of IngresoDetalle objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?IngresoDetalle
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
