<?php

namespace PoliceScanner\Repository;

use PoliceScanner\Entity\Offense;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Offense|null find($id, $lockMode = null, $lockVersion = null)
 * @method Offense|null findOneBy(array $criteria, array $orderBy = null)
 * @method Offense[]    findAll()
 * @method Offense[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OffenseRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Offense::class);
    }

    /**
     * @param Offense $offense
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(Offense $offense)
    {
        $this->getEntityManager()->persist($offense);
        $this->getEntityManager()->flush($offense);
    }

    /**
     * @param Offense $offense
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function delete(Offense $offense)
    {
        $this->getEntityManager()->remove($offense);
        $this->getEntityManager()->flush($offense);
    }

//    /**
//     * @return Offense[] Returns an array of Offense objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Offense
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
