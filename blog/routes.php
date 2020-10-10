<?php
    return (function()
        {
            return [
                [
                    'test' => '/^\/?$/',
                    'controller' => 'all',
                    'params' => []
                ],
                [
                    'test' => '/^add\/?$/',
                    'controller' => 'add',
                    'params' => []
                ],
                [
                    'test' => "/^article\/([1-9]+\d*)\/?$/",
                    'controller' => 'article',
                    'params' => ['id' => 1]
                ],
                [
                    'test' => '/^categories\/([1-9]+\d*)\/?$/',
                    'controller' => 'categories',
                    'params' => ['id' => 1],
                ],
                [
                    'test' => "/^delete\/([1-9]+\d*)\/?$/",
                    'controller' => 'delete',
                    'params' => ['id' => 1],
                ],
                [
                    'test' => "/^edit\/([1-9]+\d*)\/?$/",
                    'controller' => 'edit',
                    'params' => ['id' => 1],
                ],
                [
                    'test' => "/^auth\/login\/?$/",
                    'controller' => 'auth/login',
                    'params' => []
                ],
                [
                    'test' => "/^auth\/signup\/?$/",
                    'controller' => 'auth/signup',
                    'params' => []
                ],
                [
                    'test' => "/^auth\/logout\/?$/",
                    'controller' => 'auth/logout',
                    'params' => []
                ]
            ];  
        })();