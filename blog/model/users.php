<?php

    function addUser(array $fields) : bool 
    {
        $sql = "INSERT INTO `users` (login, password, email, nickname) VALUES (:login, :password, :email, :nickname)";
        $query = dbQuery($sql, $fields);
        dbCheckError($query);
        return true;
    }

    function getUserOne(string $login) : ?array {
        $sql = "SELECT * FROM users WHERE login = :login";
        $query = dbQuery($sql, ['login' => $login]);
        dbCheckError($query);
        $user = $query->fetch();
        // return $user !== false ? $user : null;
        return $user === false ? null : $user;
    }

    function userById(int $id) : ?array 
    {
        $sql = "SELECT id_user, login, nickname, email FROM users WHERE id_user = :id";
        $query = dbQuery($sql, ['id'=> $id]);
        $user = $query->fetch();
        return $user === false ? null : $user;
    }
