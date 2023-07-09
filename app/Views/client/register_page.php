<?= $this->extend('client/layout') ?>
<?= $this->section('content') ?>
<section class="login-section clearfix">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 ml-auto mr-auto">
                <div class="wrap-login">
                    <form action="/Client/register" method="post" id="loginForm">
                        <div class="form-group">
                            <i class="fa fa-user"></i>
                            <input type="text" name='firstname' placeholder="Firstname" required/>
                        </div>
                        <div class="form-group">
                            <i class="fa fa-user"></i>
                            <input type="text" name='lastname' placeholder="Lastname"  required/>
                        </div>
                        <div class="form-group">
                            <i class="fa fa-envelope-o"></i>
                            <input type="email" name='email' placeholder="Email" />
                        </div>
                        <div class="form-group">
                            <i class="fa fa-phone"></i>
                            <input name="phonenumber" type="text" value="" placeholder="Cell Phone"  required/>
                        </div>
                        <div class="form-group">
                            <i class="fa fa-map"></i>
                            <textarea name="address" id=""  required></textarea>
                        </div>
                        <div class="form-group">
                            <i class="fa fa-lock"></i>
                            <input type="password" name='password' placeholder="password"  required/>
                        </div>
                        <div class="form-group">
                            <button id="login-button" type="submit" class="button action-button expand-center mb-15">
                                <span class="label">Register</span>
                                <span class="spinner"></span>
                            </button>
                        </div>

                        <div class="pt-5">
                            <h6 class="font-weight-normal">OR</h6>
                        </div>

                        <div class="form-group">
                            <button id="login-button" type="button" class="button action-button expand-center mb-15" onclick="location.href='<?= base_url('client/login')?>'">
                                <span class="label">Login</span>
                                <span class="spinner"></span>
                            </button>
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--login-section end-->
<?= $this->endSection() ?>