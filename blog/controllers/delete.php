<?php

    declare(strict_types = 1);

    if($user === null) {
        header('Location:' . BASE_URL . 'auth/login');
        exit();
    }

    // parse URL used parseUrl() can find this define in index
    $strId = URL_PARAMS['id'];
    //check id with pattern
    $checkId = checkId($strId);
    $id = ($checkId ? ((int) $strId) : null);

    if($id === null) {
        $pageContent = template('error/v_404');
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found"); 
    }

    $article = getOneArticle($id);
    $hasArticle = $article !== null;
    
    $flag = false;

    if($hasArticle) {
        removeArticle($id);
        $flag = true;
        header("Location: " . BASE_URL);
        exit();
    } else {
        $pageContent = template('error/v_404');
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found"); 
    }

    