<?php

namespace App\Repository;

use App\Entity\ClassModel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ClassModel>
 *
 * @method ClassModel|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClassModel|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClassModel[]    findAll()
 * @method ClassModel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClassModelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClassModel::class);
    }
}
