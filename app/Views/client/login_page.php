<?= $this->extend('client/layout') ?>
<?= $this->section('content') ?>

<section class="login-section clearfix">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 ml-auto mr-auto">
                <div class="wrap-login">
                    <form action="" method="post" id="loginForm">
                        <?php if (!empty(session()->get('alert'))): ?>
                            <div class="alert alert-danger" role="alert">
                                <?= session()->get('alert') ?>
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <i class="fa fa-envelope-o"></i>
                            <input type="text" name='username' placeholder="Email or Phone number" required />
                        </div>
                        <div class="form-group">
                            <i class="fa fa-lock"></i>
                            <input type="password" name='password' placeholder="password" required />
                        </div>
                        <div class="form-group">
                            <button id="login-button" type="submit" class="button action-button expand-center">
                                <span class="label">Login</span>
                                <span class="spinner"></span>
                            </button>
                        </div>
                        <div class="">
                            <h6 class="font-weight-normal">OR</h6>
                        </div>
                        <div class="form-group">
                            <button id="login-button" type="button" class="button action-button expand-center mb-15" onclick="location.href='<?= base_url('client/register')?>'">
                                <span class="label">Register</span>
                                <span class="spinner"></span>
                            </button>
                        </div>
                        <!-- <div class="form-group d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center justify-content-start">
                                <input type="checkbox"> <span class="ttm-textcolor-darkgrey">Remember Me</span>
                            </div>
                            <div class="d-flex flex-row align-items-center justify-content-end">
                                <a href="#" id="forgot-password-link" class="forgot-password-link">Forgot
                                    <u>Password?</u></a>
                            </div>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--login-section end-->
<?= $this->endSection() ?>