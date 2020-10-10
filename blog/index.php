<?php
    declare(strict_types = 1);

    include_once('init.php'); 

    session_start();

    $user = authGetUser();
    
    $pageCanonical = HOST . BASE_URL;
    $uri = $_SERVER['REQUEST_URI'];
    $badUrl = BASE_URL . 'index.php';
    

    if(strpos($uri, $badUrl) === 0) {
        $cname = 'error404';
    } else {

        $routes = include('routes.php');
        $url = $_GET['querysystemurl'] ?? '';
        $routerRes = parseUrl($url, $routes);
        define('URL_PARAMS', $routerRes['params']);
        $cname = $routerRes['controller'];

        $urlLen = strlen($url);

        if($urlLen > 0 && $url[$urlLen - 1] == '/') {
            $url = substr($url, 0, $urlLen - 1);
        }

        $pageCanonical .= $url;
    }


    $path = "controllers/$cname.php";
    $pageTitle = $pageContent = '';
    $isFileExists = file_exists($path); 

    if(!file_exists($path)) {
        $cname = 'error404';
        $path = "controllers/$cname.php";
    } else {
        // exit('fatal error....');
    }

    include_once($path);


    
$html = template('base/v_main', [
    'title' => $pageTitle,
    'content' => $pageContent,
    'canonical' => $pageCanonical,
    'user' => $user
]);
echo $html;
