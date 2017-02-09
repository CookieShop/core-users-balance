<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Adteam\Core\Users\Balance\Repository;

/**
 * Description of CoreOrderProductsRepository
 *
 * @author dev
 */
use Doctrine\ORM\EntityRepository;
use Adteam\Core\Users\Balance\Entity\CoreProductsXCategories;

class CoreOrderProductsRepository extends EntityRepository
{
    //put your code here
    public function getOrdersProducts($userId)
    {
        $currentRepo = $this;
        return $this->_em->transactional(
            function ($em) use($userId,$currentRepo) {
                return $currentRepo
                        ->createQueryBuilder('U')
                        ->select('COUNT(U.id) as countProduct,'.
                                'A.createdAt,A.description,A.fileName,'.
                                'A.id,A.modifiedAt,A.name,A.sort')
                        ->innerJoin('U.order', 'R')
                        ->innerJoin('R.user', 'O')
                        ->leftJoin(CoreProductsXCategories::class, 
                                'C','WITH','C.product = U.product')
                        ->innerJoin('C.category', 'A')
                        ->groupBy('A.name')
                        ->where('O.id = :userId')
                        ->setParameter('userId', $userId)->getQuery()->iterate();  
            }
        );        
      
    }        
}
