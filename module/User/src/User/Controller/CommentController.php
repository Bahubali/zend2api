<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace User\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
use JMS\Serializer\SerializationContext;
/**
 * Description of UserController
 *
 * @author bahubali
 */
class CommentController extends AbstractRestfulController 
{
    /**
     * 
     * @return \Zend\View\Model\JsonModel
     */
    public function getList() {
        try {
            $comments = $this->getServiceLocator()
                ->get('Comment\Service')->getComments();

            $serializer = \JMS\Serializer\SerializerBuilder::create()->build();
            $json = $serializer->serialize($comments, 'json', 
                    SerializationContext::create()->setGroups(
                        array('comment-list')
                    )); 
            
            return new JsonModel(json_decode($json));
        } catch (Exception $ex) {
            $this->getResponse()->setStatusCode(401);
            return new JsonModel(array('message' => $ex->getMessage()));
        }                
    }


    //put your code here
}
