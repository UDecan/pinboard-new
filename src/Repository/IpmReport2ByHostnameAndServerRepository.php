<?php

namespace App\Repository;

use App\Entity\IpmReport2ByHostnameAndServer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<IpmReport2ByHostnameAndServer>
 *
 * @method IpmReport2ByHostnameAndServer|null find($id, $lockMode = null, $lockVersion = null)
 * @method IpmReport2ByHostnameAndServer|null findOneBy(array $criteria, array $orderBy = null)
 * @method IpmReport2ByHostnameAndServer[]    findAll()
 * @method IpmReport2ByHostnameAndServer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IpmReport2ByHostnameAndServerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IpmReport2ByHostnameAndServer::class);
    }

//    /**
//     * @return IpmReport2ByHostnameAndServer[] Returns an array of IpmReport2ByHostnameAndServer objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?IpmReport2ByHostnameAndServer
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
