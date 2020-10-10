<?php

    function checkControllerName(string $name) : bool
    {   
        return !!preg_match('/^[a-z]+$/', $name);
    }

    function checkId(string $srtId): bool
    {
        return !!preg_match('/^[1-9]+\d*$/', $srtId);

        // if($result) {
        //     return $result;
        // } else {
        //     return false;
        // }
    }

    function articlesValidateError(array &$fields) : array
    {
        $errors = [];
        $strLength = mb_strlen($fields['content'], 'UTF-8');

        if(mb_strlen($fields['title'], 'UTF-8') < 2) {
            $errors[] = 'Заголовок не короче 2 символов!';
        }
        if(mb_strlen($fields['title'], 'UTF-8') > 50 ) {
            $errors[] = 'Заголовок не больше 50 символов!';
        }

        if($strLength < 2 || $strLength > 1000) {
            $errors[] = 'Текст не короче 2 и не больше 1000 символов!';
        }

        $fields['title'] = strip_tags($fields['title']);
        $fields['content'] = strip_tags($fields['content']);

        return $errors;
    }

    function validateForm(array &$fields) : array 
    {
        $errors = [];
        $loginLen = mb_strlen($fields['login'], 'UTF8');
        $passLen = mb_strlen($fields['password'], 'UTF8');
        $emailLen = mb_strlen($fields['email'], 'UTF8');
        $nickLen = mb_strlen($fields['nickname'], 'UTF-8');

        if($loginLen < 2) {
            $errors['login'] = 'Логин длинее 2 символов';
        }
        if($passLen < 2) {
            $errors['password'] = 'Такой пароль легко угадать!';
        }
        if($emailLen < 10) {
            $errors['email'] = 'Не короче 10 символов!';
        }
        if($nickLen < 4) {
            $errors['nickname'] = 'Не короче 4 символов!';
        }

        $fields['login'] = strip_tags($fields['login']);
        $fields['password'] = strip_tags($fields['password']);
        $fields['email'] = strip_tags($fields['email']);
        $fields['nickname'] = strip_tags($fields['nickname']);

        return $errors;
    }

    function isEmail(string $email) : bool
    {
        return !!preg_match('/[^(\w)|(\@)|(\.)|(\-)]/', $email);
    }
