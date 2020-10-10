<?php

    declare(strict_types = 1);

    // parse URL used parseUrl() can find this define in index
    $strId = URL_PARAMS['id'];
    //check id with pattern
    $checkId = checkId($strId);
    $id = ($checkId ? ((int) $strId) : null);
    
    $flag = false;
    $userNickname = '';
    
    
    if($id === null) {
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");   
        $pageContent = template('error/v_404');
    } else {
        $article = getOneArticle($id);
        $hasArticle = $article !== null;

        if($hasArticle) {

            if($article['id_user'] == ($user['id_user'] ?? '')) {
                $flag = true;
                $userNickname = $user['nickname'];
            }

            $pageTitle = $article['title'];
            $pageContent = template('v_article', [
                'article' => $article,
                'flag' => $flag,
                'userNickname' => $userNickname
            ]);
        } else {
            header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found"); 
            $pageContent = template('error/v_404'); 
        }
    }


    