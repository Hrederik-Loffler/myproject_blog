<main class="content">
    <div class="container">
        <div class="fields">
            <form class="form" id="form" method="POST">
                <div class="form-group">
                    <label for="auth-login" class="form_c">Login</label>
                    <input type="text" name="login" class="form-control" id="auth-login" placeholder="Enter login">
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
                <div class="form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="login-remember">
                    <label class="form-check-label" for="login-remember">Remember auth 1 month</label>
                </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</main>
<script defer type="text/javascript" src="<?=BASE_URL?>assets/js/login.js" charset="utf-8"></script>

