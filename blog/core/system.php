<?php

    //template engine function
    function template(string $path, array $vars = []) : string 
    {
        $fullSystemPath = "views/$path.php";
        extract($vars);
        ob_start();
        include($fullSystemPath);
        return ob_get_clean();
    }

    function parseUrl (string $url, array $routes) : array
    {
        $res = [
            'controller' => 'error404',
            'params' => []
        ]; 

        foreach($routes as $route) {
            $matches = [];

            if(preg_match($route['test'], $url, $matches)) {
                $res['controller'] = $route['controller'];
                

                // if(isset($route['params'])) {}
                foreach($route['params'] as $name => $num) {
                    $res['params'][$name] = $matches[$num];
                }
            break;
            } 
        }

        return $res;
    }


    function authGetUser() : ?array
    {
        $user = null;
        $token = $_SESSION['token'] ?? $_COOKIE['token'] ?? null;
        
        if($token !== null) {
            $session = sessionOne($token);
    
            if($session !== null) {
                $user = userById((int)($session['id_user']));
            }
    
            if($user === null) {
                unset($_SESSION['token']);
                setcookie('token', '', time() - 1, BASE_URL);
            }
        }

        return $user;
    }
