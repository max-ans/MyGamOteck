<?php

namespace App\Repository;

use App\Entity\Game;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Game|null find($id, $lockMode = null, $lockVersion = null)
 * @method Game|null findOneBy(array $criteria, array $orderBy = null)
 * @method Game[]    findAll()
 * @method Game[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Game::class);
    }

  


    public function findOneWithData ($id) {


        $queryBuilder = $this->createQueryBuilder('game');

        $queryBuilder->where('game.id = :id');
        $queryBuilder->leftJoin('game.supports', 'supports');
        $queryBuilder->addSelect('supports');
        $queryBuilder->setParameter(':id', $id);
        $query = $queryBuilder->getQuery();
        
        return $query->getOneOrNullResult();

       

    }
}
