<?php

    declare(strict_types = 1);  


    $articles = getAllArticles();

    //max size of $articles['content'] = 900 on page with all articles
    $articles = trimArrayStringContent($articles);

    $categories = getAllCategories();


    $pageTitle = 'All articels';
    $pageContent = template('v_index', [
        'articles' => $articles,
        'categories' => $categories
    ]);