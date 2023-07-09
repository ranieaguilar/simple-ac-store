<?= $this->extend('Admin/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-6">
        <div class="card border-left-primary mb-4">
            <div class="card-header">
                <h5>About the system</h5>
            </div>
            <div class="card-body">
                <form action="/Admin/updateSystemName" method="post">
                    <div class="form-group">
                        <label class="small mb-1" for="username">Store Name</label>
                        <input class="form-control" id="sysname" type="text" placeholder="Enter your organization name"
                            value="<?= session()->get('ss_name') ?>" name="sysname" />
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card border-left-primary mb-4">
            <div class="card-header">
                <h5>System Images</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4 text-center">
                        <img class="img-account-profile rounded-circle border-dark"
                            src="<?= base_url('public/admin/') . session()->get('ss_image')?>"
                            alt="profile pic" width="110" height="110" />
                    </div>
                    <div class="col-sm-8">
                        <form action="/Admin/updateSystemImage" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Choose New Store Image</label>
                                <input type="file" name="sysimage" class="form-control-file" id="exampleFormControlFile1" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="card border-left-primary mb-4">
            <div class="card-header">
                <h5>Add Admin</h5>
            </div>
            <div class="card-body">
                <form method="post" action="/Admin/add_admin" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputusername">Username</label>
                        <input type="text" class="form-control" id="exampleInputusername" name="username"
                            placeholder="Enter username" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1"
                            placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Admin Profile Picture</label>
                        <input type="file" name="profile_pic" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card border-left-primary">
            <div class="card-header">
                <h5>Admin List</h5>
            </div>
            <div class="table-responsive">
                <div class="card-body">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Pic</th>
                                <th>Username</th>
                                <th>Admin Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $num = 1; foreach($admins as $admin):?>
                            <tr>
                                <td><?= $num?></td>
                                <td class="text-center"><img class="img-account-profile rounded-circle"
                                        src="<?= base_url('public/admin/') . $admin['admin_profile_pic']?>"
                                        alt="profile pic" width="40" height="40" /></td>
                                <td><?= $admin['admin_username']?></td>
                                <td><?= $admin['admin_type']?></td>
                                <td><?= $admin['admin_status']?></td>
                                <td class="text-center">
                                    <button class="btn btn-success btn-sm btn-icon" bs-toggle="tooltip"
                                        data-bs-placement="top" title="Edit" data-toggle="modal"
                                        data-target="#editModal<?= $admin['admin_id']?>" <?php if(session()->get('admin_id') == $admin['admin_id']){echo 'disabled';}?>>
                                        <i class="fas fa-pen"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm btn-icon" bs-toggle="tooltip"
                                        data-bs-placement="top" title="delete" data-toggle="modal"
                                        data-target="#deleteModal<?=  $admin['admin_id'] ?>" <?php if(session()->get('admin_id') == $admin['admin_id']){echo 'disabled';}?>>
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <div class="modal fade" id="deleteModal<?= $admin['admin_id'] ?>" tabindex="-1"
                                role="dialog" aria-labelledby="editModalLabel<?= $admin['admin_id'] ?>"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel<?= $admin['admin_id'] ?>">Are you
                                                sure
                                                you want to Delete this Admin?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Username: <strong><?= $admin['admin_username'] ?></strong></p>
                                            <p>Admin Type: <strong><?= $admin['admin_type'] ?></strong></p>
                                            <p>Status: <strong><?= $admin['admin_status'] ?></strong></p>
                                        </div>
                                        <div class="card-footer text-right">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <a href="/Admin/deleteAdmin/<?= $admin['admin_id'] ?>"
                                                class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="editModal<?= $admin['admin_id'] ?>" tabindex="-1" role="dialog"
                                aria-labelledby="editModalLabel<?= $admin['admin_id'] ?>" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel<?= $admin['admin_id'] ?>">Edit
                                                Admin</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="/Admin/updateAdmin" method="POST" enctype="multipart/form-data">
                                            <div class="modal-body">

                                                <input type="hidden" name="admin_id"
                                                    value="<?= $admin['admin_id'] ?>">
                                                <div class="form-group">
                                                    <label for="exampleInputusername">Username</label>
                                                    <input type="text" class="form-control" id="exampleInputusername"
                                                        name="username" placeholder="Enter username"
                                                        value="<?= $admin['admin_username'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Password</label>
                                                    <input type="password" class="form-control" name="password"
                                                        id="exampleInputPassword1" placeholder="Password">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="">Admin Type</label>
                                                    <select name="admin_type" class="form-control" <?php if(session()->get('admin_id') == $admin['admin_id']){echo 'disabled';}?>>
                                                        <option selected="selected" value="admin">Admin</option>
                                                        <option value="super_admin">Super Admin</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlFile1">Admin Profile Picture</label>
                                                    <input type="file" name="profile_pic" class="form-control-file"
                                                        id="exampleFormControlFile1">
                                                </div>

                                            </div>
                                            <div class="card-footer text-right">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <input type="submit" class="btn btn-primary" value="Update">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $num = $num + 1;?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>