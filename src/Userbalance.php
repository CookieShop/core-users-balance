<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Adteam\Core\Users\Balance;

use Zend\ServiceManager\ServiceManager;
use Doctrine\ORM\EntityManager;
use Adteam\Core\Users\Balance\Entity\CoreOrderProducts;

/**
 * Description of Balance
 *
 * @author dev
 */
class Userbalance {
    
    /**
     *
     * @var type 
     */
    protected $service;
    
    /**
     *
     * @var type 
     */
    protected $params;
        
    /**
     *
     * @var type 
     */
    protected $em;
    
    /**
     * 
     * @param ServiceManager $service
     */
    public function __construct(ServiceManager $service) {
        $this->service = $service;  
        $this->em = $service->get(EntityManager::class); 
    }
    
    public function getBalance($userId)
    {
        $items = $this->em->getRepository(CoreOrderProducts::class)
                ->getOrdersProducts($userId);
        return ['expenseOverview'=>  $this->setEntities($items)];
    }    
    
    private function setEntities($items)
    {
        $entities = [];
        foreach ($items as $item){
            $entity = end($item);
            if($entity!==false){
                $entities[] = [
                    'countProduct'=>$entity['countProduct'],
                    'category'=>[
                        'createdAt'=> $entity['createdAt']->format('d-m-Y H:i:s'),
                        'description'=>$entity['description'],
                        'fileName'=>$entity['fileName'],
                        'id'=>$entity['id'],
                        'modifiedAt'=>  is_null($entity['modifiedAt'])?
                         null:$entity['modifiedAt']->format('d-m-Y H:i:s'),
                        'name'=>$entity['name'],
                        'sort'=>$entity['sort']                        
                    ]

                ];                
            }
        }
        return $entities;        
    }        

}
