<?php

    declare(strict_types=1);

    if ($user === null) {
        header('Location:' . BASE_URL . 'auth/login');
        exit();
    }

    $cats = getAllCategories();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $fields = extractFields($_POST, ['title', 'content']);
        $fields['id_cat'] = (int)($_POST['id_cat']);
        $fields['id_user'] = $user['id_user'];

        $errors = articlesValidateError($fields);

        if (empty($errors)) {
            addArticle($fields);
            $lastId = lastInsertId();
            //redirect on last added article
            header("Location: ". BASE_URL . "article/" . $lastId);
            exit();
        }
    } else {
        $errors = [];
        $fields = ['id_cat' => '', 'title' => '', 'content' => ''];
    }

    $pageTitle = 'Добавление статьи';
    $pageContent = template('v_add', [
        'cats' => $cats,
        'fields' => $fields,
        'errors' => $errors
    ]);
