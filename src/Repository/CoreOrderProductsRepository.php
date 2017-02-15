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
use Adteam\Core\Users\Balance\Entity\OauthUsers;

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
                        ->select('SUM(U.quantity) as countProduct,'.
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
    
    /**
     * 
     * @param type $username
     * @return type
     * @throws \InvalidArgumentException
     */
    public function getUser($username)
    {
        try{
            return $this->_em->getRepository(OauthUsers::class)
                ->createQueryBuilder('T')
                ->select('T.id,T.username')
                ->where('T.username LIKE :username')
                ->setParameter('username', $username)
                ->andWhere('T.enabled = :enabled')
                ->setParameter('enabled', 1) 
                ->andWhere('T.deletedAt IS NULL')      
                ->getQuery()
                ->getSingleResult();     
        } catch (\Exception $ex) {
            throw new \InvalidArgumentException(
                    'El usuario '.$username.' no existe o esta deshabilitado');
        }
    }     
}
