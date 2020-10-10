<?php

    declare(strict_types = 1);
    

    // parse URL used parseUrl() can find this define in index
    $strId = URL_PARAMS['id'];
    //check id with pattern
    $checkId = checkId($strId);
    $id = ($checkId ? ((int) $strId) : null);
    

    if($id === null) {
        $pageContent = template('error/v_404'); 
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");      
        // exit();

    } else {

        $allArtOfCat = getAllArticlesCategory($id);
        //get one category
        $category = getCategoryById($id);

        $hasCategory = $category !== null;

        if($hasCategory) {
            $pageTitle = $category['title_categori'];
            $pageContent = template('v_cat2art', [
                'allArtOfCat' => $allArtOfCat
            ]);
        } else {
            $pageContent = template('error/v_404'); 
            header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");      
            // exit();
        }
        
    }
