<?php

namespace App\Repository;

use App\Entity\Appointments;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Appointments|null find($id, $lockMode = null, $lockVersion = null)
 * @method Appointments|null findOneBy(array $criteria, array $orderBy = null)
 * @method Appointments[]    findAll()
 * @method Appointments[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AppointmentsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Appointments::class);
    }

    // /**
    //  * @return Appointments[] Returns an array of Appointments objects
    //  */
    public function findAppointmentsPatient($value)
    {
        return $this->createQueryBuilder('p')
        ->andWhere('p.startTime like :val')
        //->orWhere('p.firstname like :val')
        ->setParameter('val',  '%'.$value.'%')
        ->orderBy('p.startTime', 'ASC')
        ->setMaxResults(10)
        ->getQuery()
        ->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?Appointments
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
