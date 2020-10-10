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
    
    if($id !== null) {
        
        $cats = getAllCategories();
        $article = getOneArticle($id);
        $hasArticle = $article !== null;

        if($hasArticle) {
            if($_SERVER['REQUEST_METHOD'] === 'GET') {
                $fields = ['title' => '', 'content' => '', 'id_cat' => ''];
                $errors = [];
                
            }
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                $fields = extractFields($_POST, ['title', 'content']);
                $fields['id_cat'] = (int)($_POST['id_cat']);
        
                $errors = articlesValidateError($fields);
                
                if(empty($errors)) {
                    editArticle($id, $fields);
                    header("Location: " . BASE_URL);
                    exit();
                }
                
            } 
        }
    }
    $pageTitle = 'Edit article';
    $pageContent = template('v_edit',[
        'cats' => $cats,
        'article' => $article,
        'fields' => $fields,
        'errors' => $errors
    ]);

    