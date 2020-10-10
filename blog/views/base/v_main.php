<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title><?=$title?></title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    
    <!-- Custom stlylesheet -->
    <link rel="canonica" href="<?=$canonical?>">
    <link rel="stylesheet" href="<?=BASE_URL?>assets/css/style.css">
    <link rel="stylesheet" href="<?=BASE_URL?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?=BASE_URL?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=BASE_URL?>assets/css/login_style.css">
</head>
<body>
    <div class="page">
        <header class="header">
            <div class="container">
                <div class="header__inner">
                    <div class="header__title">
                        <h3 class="headertitle">Title</h3>
                    </div>

                    <nav class="nav">
                        <a class="nav__link" href="<?=BASE_URL?>">home</a>
                        <a class="nav__link" href="<?=BASE_URL?>auth/signup">signup</a>
                        <? if($user !== null) :?>
                            <a class="nav__link" href="<?=BASE_URL?>auth/logout">logout(<?=$user['nickname']?>)</a>
                        <? else :?>
                            <a class="nav__link" href="<?=BASE_URL?>auth/login">log in</a>
                        <? endif ;?>
                        <a class="nav__link" href="<?=BASE_URL?>add">add article</a>
                    </nav>
                    
                </div>
            </div>
        </header>
    
            <?=$content?>
            
        <footer class="footer">
            <div>
                &copy <?=date('Y')?>
            </div>
        </footer>
    </div>
</body>
</html>
