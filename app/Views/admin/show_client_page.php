<?= $this->extend('Admin/layout') ?>
<?= $this->section('content') ?>
<div class="card shadow mb-4 border-left-primary">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Client Table List</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Address</th>
                        <th>Phone number</th>
                        <th>Email</th>
                        <th>Client Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $num =  1;
                    foreach ($client as $clients) : ?>
                    <tr>
                        <td><?= $num ?></td>
                        <td><?= $clients['client_firstname'] ?></td>
                        <td><?= $clients['client_lastname'] ?></td>
                        <td><?= $clients['client_address'] ?></td>
                        <td><?= $clients['client_phonenumber'] ?></td>
                        <td><?= $clients['client_email'] ?></td>
                        <td><?= $clients['client_description'] ?></td>
                        <td class="text-center">
                           
                            <button class="btn btn-success btn-sm btn-icon" data-toggle="modal"
                                data-target="#editModal<?= $clients['client_id'] ?>">
                                <i class="fas fa-pen"></i>
                            </button>
                            <button class="btn btn-danger btn-sm btn-icon" data-toggle="modal"
                                data-target="#deleteModal<?= $clients['client_id'] ?>">
                                <i class="fas fa-trash"></i>
                            </button>

                        </td>
                    </tr>

                    <div class="modal fade" id="editModal<?= $clients['client_id'] ?>" tabindex="-1" role="dialog"
                        aria-labelledby="editModalLabel<?= $clients['client_id'] ?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel<?= $clients['client_id'] ?>">
                                        Edit CLient</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="/Admin/update_client" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">

                                        <input type="hidden" name="client_id" value="<?= $clients['client_id'] ?>">
                                        <div class="form-group">
                                            <label for="client_fname">Client Firstname:</label>
                                            <input type="text" class="form-control" id="client_fname"
                                                name="client_firstname" required
                                                value="<?= $clients['client_firstname'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="client_lname">Client Lastname:</label>
                                            <input type="text" class="form-control" id="client_lname"
                                                name="client_lastname" required
                                                value="<?= $clients['client_lastname'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="client_address">Client Address:</label>
                                            <textarea class="form-control" id="client_address" name="client_address"
                                                rows="3" required><?= $clients['client_address']?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="client_phonenumber">Client Phone Number:</label>
                                            <input type="number" class="form-control" id="client_phonenumber"
                                                name="phonenumber" required
                                                value="<?= $clients['client_phonenumber']?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="client_email">Client Email:</label>
                                            <input type="text" class="form-control" id="client_email"
                                                name="client_email" required value="<?= $clients['client_email']?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="client_email">Client Password:</label>
                                            <input type="password" class="form-control" id="client_password"
                                                name="client_password" value="">
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

                    <div class="modal fade" id="deleteModal<?= $clients['client_id'] ?>" tabindex="-1"
                        role="dialog" aria-labelledby="editModalLabel<?= $clients['client_id'] ?>"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel<?= $clients['client_id'] ?>">Delete Client</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h6>Are you sure you want to delete this Client?</h6>
                                    <p>Name: <strong><?= $clients['client_firstname'] .' '. $clients['client_lastname'] ?></strong></p>

                                </div>
                                <div class="card-footer text-right">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="/Admin/deleteClient/<?= $clients['client_id'] ?>"
                                        class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php $num = $num + 1;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>