<main class="content">
    <div class="container">
        <div class="fields">
            <form class="form" id="form" method="POST">
                <div class="form-group">
                    <label for="auth-login" class="form_c">Login</label>
                    <input type="text" name="login" class="form-control" id="auth-login" placeholder="Enter login" value="<?=$login?>">
                    <?if($loginError):?>
                        <small class="ee"><?=$loginError?></small>
                    <?endif;?>
                    <small></small>
                </div>
                <div class="form-group">
                    <label for="auth-password" class="form_c">Password</label>
                    <input type="password" name="password" class="form-control" id="auth-password" placeholder="Password">
                    <?if($passwordError):?>
                        <small class="ee"><?=$passwordError?></small>
                    <?endif;?>
                    <small></small>
                </div>
                <div class="form-group">
                    <label for="auth-email" class="form_c">Email</label>
                    <input type="email" name="email" class="form-control" name="email" id="auth-email" placeholder="Email" value="<?=$email?>">
                    <?if($emailError):?>
                        <small class="ee"><?=$emailError?></small>
                    <?endif;?>
                    <small></small>
                </div>
                <div class="form-group">
                    <label for="auth-nickname" class="form_c">Nickname</label>
                    <input type="text" name="nickname" class="form-control" name="nickname" id="auth-nickname" placeholder="Nickname" value="<?=$nickname?>">
                    <?if($nicknameError):?>
                        <small class="ee"><?=$nicknameError?></small>
                    <?endif;?>
                    <small></small>
                </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</main>
<script defer type="text/javascript" src="<?=BASE_URL?>assets/js/main.js" charset="utf-8"></script>