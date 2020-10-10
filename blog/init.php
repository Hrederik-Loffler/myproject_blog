<?php

    const HOST = 'http://localhost';

    const BASE_URL = '/blog/';

    // Database info (if you want to test the script, please edit the below constants with yours)
    const DB_HOST = 'localhost';
    const DB_NAME = 'blogtest';
    const DB_USER = 'main';
    const DB_PASS = 'passwordsql';
    
    include_once('core/arr.php');
    include_once('core/db.php');
    include_once('core/system.php');
    include_once('core/validation.php');

    include_once('model/articles.php');
    include_once('model/users.php');
    include_once('model/session.php');
    