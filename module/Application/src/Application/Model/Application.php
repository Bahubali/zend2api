<?php

/**
 * Module.php
 *
 * Deals with application related common functionality
 *
 * @category   Application
 * @package    Admin
 * @author     Costrategix <info@costrategix.com>
 * @license    http://www.costrategix.com
 */

namespace Application\Model;


class Application {

    /**
     * 
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;

    /**
     *
     * @var \Zend\ServiceManager\ServiceManager
     */
    protected $serviceManager;

    /**
     * Set entity manager
     * 
     * @param \Doctrine\ORM\EntityManager $entityManager
     */
    public function setEntityManager(\Doctrine\ORM\EntityManager $entityManager) {
        if (!isset($this->entityManager)) {
            $this->entityManager = $entityManager;
        }
    }

    /**
     * Get entity manager
     * 
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEntityManager() {
        if (isset($this->entityManager)) {
            return $this->entityManager;
        }
    }

    /**
     * Set service manager
     * 
     * @param \Zend\ServiceManager\ServiceManager $serviceManager
     */
    public function setServiceManager(
        \Zend\ServiceManager\ServiceManager $serviceManager
    ) {
        if (!isset($this->serviceManager)) {
            $this->serviceManager = $serviceManager;
        }
    }

    /**
     * Get service manager
     *
     * @return resource \Zend\ServiceManager\ServiceManager
     */
    public function getServiceManager() {
        if (isset($this->serviceManager)) {
            return $this->serviceManager;
        }
    }

    /**
     * Save entity
     * 
     * @param $entity
     */
    public function saveRecord($entity) {
        try {            
            $entity->setCreateDtTm(new \DateTime());
            $entity->setUpdateDtTm(new \DateTime());
                        
            if (!is_null($entity)) {
                $this->getEntityManager()->persist($entity);
                $this->getEntityManager()->flush();
                
                return $entity;
            }
        } catch (\Exception $exception) {

            throw new \Exception($exception->getMessage());
        }
    }

    /**
     * Update entityce
     * 
     * @param \Entity $entity
     */
    public function updateRecord($entity) {        
        if ($this->isPersisted($entity)) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Delete entity
     * 
     * @param \Entity $entity
     */
    public function deleteRecord($entity) {
        if ($this->isPersisted($entity)) {
            $this->getEntityManager()->remove($entity);
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Check if entity is persisted or not
     * 
     * @param \Entity $entity
     */
    public function isPersisted($entity) {
        $isPersisted 
            = (\Doctrine\ORM\UnitOfWork::STATE_MANAGED 
                === $this->getEntityManager()->getUnitOfWork()
                ->getEntityState($entity));

        return $isPersisted;
    }
    
}
