<?php

    function sessionAdd (int $idUser, string $token) :bool
    {   
        $params = ['uid' => $idUser, 'token' => $token];
        $sql = "INSERT INTO sessions (id_user, token) VALUES (:uid, :token)";
        dbQuery($sql, $params);
        // $query = dbQuery($sql, $params);
        // dbCheckError($query);
        return true;
    }

    function sessionOne(string $token) : ?array 
    {
        $sql = "SELECT * FROM sessions WHERE token = :token";
        $query = dbQuery($sql, ['token'=> $token]);
        $session = $query->fetch();
        return $session === false ? null : $session;
    }

    function sessionDel (int $idUser) :bool
    {
        $params = ['uid' => $idUser];
        $sql = "DELETE FROM `sessions` WHERE id_user = $idUser";
        dbQuery($sql, $params);
        return true;
    }