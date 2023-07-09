<?= $this->extend('client/layout') ?>
<?= $this->section('content') ?>
<section class="login-section clearfix">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 ml-auto mr-auto">
                <div class="wrap-login">
                    <form action="/Client/view_profile" method="post" id="loginForm">
                        <input type="hidden" name="client_id" value="<?= session()->get('client_id');?>">
                        <label for="">Firstname</label>
                        <div class="form-group">

                            <i class="fa fa-user"></i>
                            <input type="text" name='firstname' placeholder="Firstname" required
                                value="<?= session()->get('client_firstname');?>" />
                        </div>
                        <label for="">Lastname</label>
                        <div class="form-group">

                            <i class="fa fa-user"></i>
                            <input type="text" name='lastname' placeholder="Lastname" required
                                value="<?= session()->get('client_lastname');?>" />
                        </div>
                        <label for="">Email</label>
                        <div class="form-group">

                            <i class="fa fa-envelope-o"></i>
                            <input type="email" name='email' placeholder="Email"
                                value="<?= session()->get('client_email');?>" />
                        </div>
                        <label for="">Phone number</label>
                        <div class="form-group">

                            <i class="fa fa-phone"></i>
                            <input name="phonenumber" type="text" placeholder="Cell Phone" required
                                value="<?= session()->get('client_phonenumber');?>" />
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea name="address" id="" required><?= session()->get('client_address');?></textarea>
                        </div>
                        <label for="">New password</label>
                        <div class="form-group">

                            <i class="fa fa-lock"></i>
                            <input type="password" name='password' placeholder="password" />
                        </div>
                        <div class="form-group">
                            <button id="login-button" type="submit" class="button action-button expand-center mb-15">
                                <span class="label">Update</span>
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