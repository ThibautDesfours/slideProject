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

    public function findBySlide($id)
    {
        return $this->createQueryBuilder('pe')
            ->Select('p.id, p.name_picture, p.createdAt, p.path_picture, pe.x_start, pe.y_start, pe.w_start, pe.h_start, pe.x_end, pe.y_end, pe.w_end, pe.h_end,  pe.length_effect')
            ->join('pe.picture','p')
            ->andWhere('pe.slide = :slide_id')
            ->setParameter('slide_id', $id)
            ->orderBy('p.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findBySlideId($id)
    {
        return $this->createQueryBuilder('pe')
            ->andWhere('pe.slide = :slide_id')
            ->setParameter('slide_id', $id)
            ->getQuery()
            ->getResult();
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
