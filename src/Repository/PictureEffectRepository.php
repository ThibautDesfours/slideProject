<?php

namespace App\Repository;

use App\Entity\PictureEffect;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PictureEffect|null find($id, $lockMode = null, $lockVersion = null)
 * @method PictureEffect|null findOneBy(array $criteria, array $orderBy = null)
 * @method PictureEffect[]    findAll()
 * @method PictureEffect[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PictureEffectRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PictureEffect::class);
    }

    // /**
    //  * @return PictureEffect[] Returns an array of PictureEffect objects
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
    public function findOneBySomeField($value): ?PictureEffect
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
