<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace User\Model;

use Application\Model\Application;

class Comment 
{
    protected $application;
    /**
     * 
     * @param \Application\Model\Application $application
     */
    public function __construct(Application $application) {
        $this->application = $application;
    }
    
    /**
     * Return all active users
     * 
     * @return collections
     */
    public function getComments() {
        $criteria = new \Doctrine\Common\Collections\Criteria();
        $criteria->where($criteria->expr()->eq('deleteFlag', 0));
        
        return $this->application->getEntityManager()
            ->getRepository('User\Entity\Comment')->matching($criteria);
    }
}