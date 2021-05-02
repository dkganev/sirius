<?php

namespace App\Repository;

use App\Entity\ScheduleList;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)  ScheduleListRepository
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScheduleListRepository2 extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ScheduleList::class);
    }

    // /**
    //  * @return Product[] Returns an array of Product objects
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
    public function findOneBySomeField($value): ?Product
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function findAllGreaterThanPrice( $price): array
    {
        $conn = $this->getEntityManager()->getConnection();
        //
//        $sql = '
//            SELECT * FROM product p
//            
//            ORDER BY p.id ASC
//            ';
        $sql = "
            INSERT INTO ScheduleList(onYear, onDay, onMonth, onTitle) 
            VALUES (2021,8,05, '$price') 
            
            
            ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // returns an array of arrays (i.e. a raw data set)
        //return ;
        return ['stmt' => $stmt];
        //return $stmt->fetchAllAssociative();
    }
    
    
}
