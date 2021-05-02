<?php

namespace App\Repository;

use App\Entity\ScheduleList;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ScheduleList|null find($id, $lockMode = null, $lockVersion = null)
 * @method ScheduleList|null findOneBy(array $criteria, array $orderBy = null)
 * @method ScheduleList[]    findAll()
 * @method ScheduleList[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScheduleListRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ScheduleList::class);
    }

    // /**
    //  * @return ScheduleList[] Returns an array of ScheduleList objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ScheduleList
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    
    public function getEventsForDay($onYear, $onDay, $onMonth): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = 
            'SELECT '
                .'s.id, '
                .'s.onTitle '
            .'FROM ScheduleList s ' 
            .'Where '
                ."s.onYear = $onYear AND "
                ."s.onDay = $onDay AND "
                ."s.onMonth = $onMonth "
            .'ORDER BY s.id ASC' 
        ;
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAllAssociative();
    }
    
    public function saveAppointmentForm( $formData)
    {
        $conn = $this->getEntityManager()->getConnection();
        
        $sql = 
            'SELECT * ' 
            .'FROM ScheduleList s '
            .'WHERE '
                ."s.onYear = " . intval($formData['onYear']) . " AND "
                ."s.onDay = " . intval($formData['onDay']) . " AND "
                ."s.onTitle = '" . $formData['onTitle'] . "' AND "
                ."s.onMonth = " . intval($formData['onMonth']) 
        ;
        
        $chekIfExist = $conn->prepare($sql);
        $chekIfExist->execute();
        
        if (!empty($chekIfExist->fetchAllAssociative())){
            return false;
        }
        
        $columns = implode(", ",array_keys($formData));
        $escaped_values = array_values($formData);
        foreach ($escaped_values as $key=>$value) $escaped_values[$key] = "'".$value."'";
        $values  = implode(", ", $escaped_values);

        $sqlQuery = "INSERT INTO ScheduleList ($columns) VALUES ($values)";
                        
        $queryInsert = $conn->prepare($sqlQuery);
        $queryInsert->execute();
        
        return true;
    }
}
