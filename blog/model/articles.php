<?php

    include_once('core/db.php');

    function addArticle(array $fields) : bool 
    {
        $sql = "INSERT INTO articles (title, content, id_cat, id_user) VALUES (:title, :content, :id_cat, :id_user)";
        $query = dbQuery($sql, $fields);
        dbCheckError($query);
        return true;
    }
    
    function getAllCategories() : array
    {
        $sql = "SELECT * FROM categories";
        $query = dbQuery($sql);
        dbCheckError($query);
        return $query->fetchAll();
    }

    function getAllArticles() : array
    {
        $sql = "SELECT * FROM articles ORDER BY dt_add DESC";
        $query = dbQuery($sql);
        dbCheckError($query);
        return $query->fetchAll();
    }

    function getAllArticlesCategory(int $idCat) : ?array 
    {
        $sql = "SELECT articles.* FROM `articles` WHERE articles.id_cat = $idCat";
        $query = dbQuery($sql);
        dbCheckError($query);
        $categories = $query->fetchAll();
        return is_array($categories) ? $categories : null;
    }

    function getCategoryById (int $idCat) : ?array
    {
        $sql = "SELECT categories.* FROM categories WHERE categories.id_cat = $idCat";
        $query = dbQuery($sql);
        dbCheckError($query);
        $category = $query->fetch();
        return is_array($category) ? $category : null;
    }

    function getOneArticle(int $id) : ?array
    {
        $sql = "SELECT articles.*, categories.title_categori FROM articles JOIN categories USING (id_cat) WHERE articles.id_article = $id";
        $query = dbQuery($sql);
        dbCheckError($query);
        $article = $query->fetch();
        return is_array($article) ? $article : null;
    }
    
    function editArticle(int $id, array $fields) : bool
    {
        $sql = "UPDATE articles SET title=:title, content=:content, id_cat=:id_cat WHERE id_article=:id";
        dbQuery($sql, array('title'=>$fields['title'], 'content'=> $fields['content'], 'id_cat'=>$fields['id_cat'], 'id'=> $id));
        return true;
    }

    function removeArticle($id) : bool
    {
        $sql = "DELETE FROM articles WHERE id_article=$id";
        $query = dbQuery($sql);
        dbCheckError($query);
        return true;
    }
