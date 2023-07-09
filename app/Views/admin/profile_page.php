<?= $this->extend('Admin/layout') ?>
<?= $this->section('content') ?>
<main>
    <!-- Main page content-->
    <div class=" px-4 mt-4">
        <div class="row">


            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0 border-left-primary">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2" src="<?= base_url('public/admin/') . session()->get('admin_profile_pic')?>" alt="profile pic" width="200" height="200"/>
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <!-- Profile picture upload button-->
                        <form action="/Admin/updateAdminImage/<?= session()->get('admin_id') ?>" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <input type="hidden" name="admin_id" value="<?= session()->get('admin_id') ?>">
                                <label for="exampleFormControlFile1">Choose New profile Image</label>
                                <input type="file" name="profileimage" class="form-control-file" id="exampleFormControlFile1" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4 border-left-primary">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <form method="post" action="">
                            <!-- Form Group (username)-->
                            <div class="row gx-3 mb-3">
                                <input type="hidden" name="admin_id" value="<?= session()->get('admin_id') ?>">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="username">Username</label>
                                    <input class="form-control" id="username" type="text" placeholder="Enter your organization name" value="<?= session()->get('admin_username') ?>" name="username" />
                                </div>

                                <div class="col-md-6">
                                    <label class="small mb-1" for="password">New Password</label>
                                    <input class="form-control" id="password" type="password" placeholder="Enter your new password" name="password" />
                                </div>
                            </div>
                            <!-- Form Row-->
                            <!-- <div class="row gx-3 mb-3">
                                     
                                                    <div class="col-md-6">
                                                        <label class="small mb-1" for="inputFirstName">First name</label>
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="Valerie" />
                                                    </div>
                                                 
                                                    <div class="col-md-6">
                                                        <label class="small mb-1" for="inputLastName">Last name</label>
                                                        <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value="Luna" />
                                                    </div>
                                                </div> -->
                            <!-- Form Row        -->
                            <!-- <div class="row gx-3 mb-3">
                                                
                                                    <div class="col-md-6">
                                                        <label class="small mb-1" for="inputOrgName">Organization name</label>
                                                        <input class="form-control" id="inputOrgName" type="text" placeholder="Enter your organization name" value="Start Bootstrap" />
                                                    </div>
                                               
                                                    <div class="col-md-6">
                                                        <label class="small mb-1" for="inputLocation">Location</label>
                                                        <input class="form-control" id="inputLocation" type="text" placeholder="Enter your location" value="San Francisco, CA" />
                                                    </div>
                                                </div> -->

                            <!-- <div class="mb-3">
                                                    <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                                    <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="name@example.com" />
                                                </div> -->
                            <!-- Form Row-->
                            <!-- <div class="row gx-3 mb-3">
                                                   
                                                    <div class="col-md-6">
                                                        <label class="small mb-1" for="inputPhone">Phone number</label>
                                                        <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="555-123-4567" />
                                                    </div>
                                                   
                                                    <div class="col-md-6">
                                                        <label class="small mb-1" for="inputBirthday">Birthday</label>
                                                        <input class="form-control" id="inputBirthday" type="text" name="birthday" placeholder="Enter your birthday" value="06/10/1988" />
                                                    </div>
                                                </div> -->
                            <!-- Save changes button-->
                            <button class="btn btn-primary" type="submit">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>