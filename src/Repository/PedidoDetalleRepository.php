<?php

namespace App\Repository;

use App\Entity\PedidoDetalle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PedidoDetalle|null find($id, $lockMode = null, $lockVersion = null)
 * @method PedidoDetalle|null findOneBy(array $criteria, array $orderBy = null)
 * @method PedidoDetalle[]    findAll()
 * @method PedidoDetalle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PedidoDetalleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PedidoDetalle::class);
    }

//    /**
//     * @return PedidoDetalle[] Returns an array of PedidoDetalle objects
//     */
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
    public function findOneBySomeField($value): ?PedidoDetalle
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
