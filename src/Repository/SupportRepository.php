<?php

namespace App\Repository;

use App\Entity\Support;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Support|null find($id, $lockMode = null, $lockVersion = null)
 * @method Support|null findOneBy(array $criteria, array $orderBy = null)
 * @method Support[]    findAll()
 * @method Support[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SupportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Support::class);
    }

    public function findGamesByUserAndSupport ($id, $support)
    {
        $queryBuilder = $this->createQueryBuilder('support');
        $queryBuilder->leftJoin('support.games', 'game');
        $queryBuilder->addSelect('game');
        $queryBuilder->leftJoin('game.users', 'user');
        $queryBuilder->addSelect('user');
        $queryBuilder->where('user.id = :id');
        $queryBuilder->andWhere('support.id = :support');
        $queryBuilder->setParameter(':support', $support);
        $queryBuilder->setParameter(':id', $id);
        
        $query = $queryBuilder->getQuery();
        return $query->getOneOrNullResult();
    }
}
