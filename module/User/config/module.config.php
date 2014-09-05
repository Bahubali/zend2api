<?php

namespace User;

return array(
    'controllers' => array(
        'invokables' => array(            
            'User\Controller\User' => 'User\Controller\UserController',
            'User\Controller\Comment' => 'User\Controller\CommentController'
        ) 
    ),
    'router' => array(
        'routes' => array(            
            'user' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/api/user[/:id]',
                    'defaults' => array(
                        'controller' => 'User\Controller\User',                        
                    ),
                ),
            ),
            'comment' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/api/comment[/:id]',
                    'defaults' => array(
                        'controller' => 'User\Controller\Comment',                        
                    ),
                ),
            ),
        ),
    ),
    // Doctrine config
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/../src/' . __NAMESPACE__ . '/Entity' 
                ) 
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver' 
                ) 
            ) 
        ),         
    ),
    'view_manager' => array(
        'strategies' => array(
            'ViewJsonStrategy',
        ),        
        'template_path_stack' => array(
            'api' => __DIR__ . '/../view',
        ),
    ),
);