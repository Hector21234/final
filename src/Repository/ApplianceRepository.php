<?php

namespace App\Repository;

use App\Entity\Appliance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Appliance>
 *
 * @method Appliance|null find($id, $lockMode = null, $lockVersion = null)
 * @method Appliance|null findOneBy(array $criteria, array $orderBy = null)
 * @method Appliance[]    findAll()
 * @method Appliance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApplianceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Appliance::class);
    }

    public function save(Appliance $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Appliance $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
    public function delete(int $id): void
    {
        $delete = $this->find($id);
        $this->remove($delete, true);
    }

    public function insert(array $data): void
    {
        $objeto = new Appliance;
        $objeto
            ->setId($data['id'])
            ->setNombre($data['nombre'])
            ->setModelo($data['modelo'])
            ->setInfo($data['info'])
            ->setImagen($data['imagen'])
            ;
        $this->getEntityManager()->persist($objeto);
        $this->getEntityManager()->flush();
    }

    public function update(int $id, array $data): void
    {
        $objeto2 = $this->find($id);
        $apli = $this
            ->getEntityManager()
            ->getRepository(Appliance::class)
            ->find($data['id']);
            $objeto2
        ->setId($data['id'])
        ->setNombre($data['nombre'])
        ->setModelo($data['modelo'])
        ->setInfo($data['info'])
        ->setImagen($data['imagen'])
        ;
        $this->save($objeto2, true);
    }
//    /**
//     * @return Appliance[] Returns an array of Appliance objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Appliance
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
