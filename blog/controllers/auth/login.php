<?php

    declare(strict_types = 1);

    $loginError = '';
    $passwordError = '';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $login = trim($_POST['login']);
        $password = trim($_POST['password']);
        //button remember my authentication
        $remember = isset($_POST['remember']);
        
        if($login != '' && $password != '') {

            $user = getUserOne($login);

            if($user === null) {
                $loginError = 'Incorrect login';
            }
            else{
                $passHash = substr($user['password'], 0, 60);

                if(password_verify($password, $passHash)) {        
                    $token = substr(bin2hex(random_bytes(128)), 0, 128);

                    sessionAdd((int)($user['id_user']), $token);
                    $_SESSION['token'] = $token;

                    //if user click remember my authentication
                    if($remember) {
                        setcookie('token', $token, time() + 3600 * 24 * 30);
                    }

                    header("Location: " . BASE_URL);
                    exit();
                }
                else {
                   $passwordError = 'Incorrect password';
                }
            }
        }
        else{
            $loginError = 'Incorrect login';
        }
    }
    $pageTitle = 'Login';
    $pageContent = template('v_login', 
        [
            'loginError' => $loginError,
            'passwordError' => $passwordError
        ]);