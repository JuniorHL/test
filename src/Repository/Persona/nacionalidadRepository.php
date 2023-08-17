<?php

namespace App\Repository\Persona;

use App\Entity\Persona\nacionalidad;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<nacionalidad>
 *
 * @method nacionalidad|null find($id, $lockMode = null, $lockVersion = null)
 * @method nacionalidad|null findOneBy(array $criteria, array $orderBy = null)
 * @method nacionalidad[]    findAll()
 * @method nacionalidad[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class nacionalidadRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, nacionalidad::class);
    }

//    /**
//     * @return nacionalidad[] Returns an array of nacionalidad objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('n.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?nacionalidad
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
