<?php


namespace App\Repository;

use App\Entity\Account\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function filter(): QueryBuilder
    {
        return $this->createQueryBuilder('u')
            ->leftJoin('u.profile', 'p')
            ->addSelect('p');
    }
}
