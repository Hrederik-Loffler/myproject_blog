<?php

    declare(strict_types = 1);


    $fields = ['login' => '', 'password' => '', 'email' => '', 'nickname' => ''];
    $validateForm = [];
    $loginError = '';
    $passwordError = '';
    $emailError = '';
    $nicknameError = '';
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $fields = extractFields($_POST, ['login', 'password', 'email', 'nickname']);
        $validateForm = validateForm($fields);


        if(empty($validateForm)) {
            $fields['password'] = password_hash($fields['password'], PASSWORD_BCRYPT);
            addUser($fields);
            header("Location: " . BASE_URL);
            exit();
        } else {
            $loginError = $validateForm['login'] ?? '';
            $passwordError = $validateForm['password'] ?? '';
            $emailError = $validateForm['email'] ?? '';
            $nicknameError = $validateForm['nickname'] ?? '';
        }
    }

    $pageTitle = 'Welcome';
    $pageContent = template('v_signup', [
        'validateForm' => $validateForm,
        'loginError' => $loginError,
        'passwordError' => $passwordError,
        'emailError' => $emailError,
        'nicknameError' => $nicknameError,
        'login' => $fields['login'],
        'email' => $fields['email'],
        'nickname' => $fields['nickname']
    ]);