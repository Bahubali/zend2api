<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace User;


class Module
{
    /**
     * Get module config
     * 
     * @return array
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * Get autolader configeration
     * 
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    /**
     * Module service configuration
     */
    public function getServiceConfig() {

        return array(
            'factories' => array(
                'User\Service' => function($serviceManager) {
                    $userService 
                        = new Model\User($serviceManager->get('Application\Service'));
                    
                    return $userService;
                },
                'Comment\Service' => function($serviceManager) {
                    $commentService 
                        = new Model\Comment($serviceManager->get('Application\Service'));
                    
                    return $commentService;
                }        
            )
        );
    }
}
