<?php

    declare(strict_types=1);

    $user = authGetUser();
    $token = $_SESSION['token'] ?? $_COOKIE['token'] ?? null;

    if ($token === null) {
        header("Location: " . BASE_URL);
        exit();
    } else {
        unset($_SESSION['token']);
        setcookie('token', '', time() - 1, BASE_URL);
        sessionDel((int)($user['id_user']));
        header("Location: " . BASE_URL);
        exit();
    }
