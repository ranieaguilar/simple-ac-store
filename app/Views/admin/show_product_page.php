<?= $this->extend('Admin/layout') ?>
<?= $this->section('content') ?>
<div class="card shadow mb-4 border-left-primary">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Product Table List</h6>
    </div>
    <div class="card-body">
        <a class="btn btn-primary mb-3" href="/Admin/createProduct">Add new Product</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Type</th>
                        <th>Cooling Capacity</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $num =  1;
                    foreach ($products as $prod) : ?>
                    <tr>
                        <td><?= $num ?></td>
                        <td><?= $prod['product']['product_name'] ?></td>
                        <td><?= $prod['product']['product_brand'] ?></td>
                        <td><?= $prod['product']['product_model'] ?></td>
                        <td><?= $prod['product']['product_type'] ?></td>
                        <td><?= $prod['product']['product_cooling_capacity'] ?></td>
                        <td><?= $prod['product']['product_name'] ?></td>
                        <td><?= $prod['product']['product_stock_quantity'] ?></td>
                        <td class="text-center">
                            <button class="btn btn-primary btn-sm btn-icon" bs-toggle="tooltip" data-bs-placement="top"
                                title="View" data-toggle="modal"
                                data-target="#viewModal<?= $prod['product']['product_id'] ?> ">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="btn btn-success btn-sm btn-icon" bs-toggle="tooltip" data-bs-placement="top"
                                title="Edit" data-toggle="modal"
                                data-target="#editModal<?= $prod['product']['product_id'] ?>">
                                <i class="fas fa-pen"></i>
                            </button>
                            <button class="btn btn-danger btn-sm btn-icon" bs-toggle="tooltip" data-bs-placement="top"
                                title="delete" data-toggle="modal"
                                data-target="#deleteModal<?= $prod['product']['product_id'] ?>">
                                <i class="fas fa-trash"></i>
                            </button>

                        </td>
                    </tr>
                    <div class="modal fade" id="editModal<?= $prod['product']['product_id'] ?>" tabindex="-1"
                        role="dialog" aria-labelledby="editModalLabel<?= $prod['product']['product_id'] ?>"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel<?= $prod['product']['product_id'] ?>">
                                        Edit Product - <?= $prod['product']['product_name'] ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/Admin/updateProduct" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="product_id"
                                            value="<?= $prod['product']['product_id'] ?>">
                                        <div class="form-group">
                                            <label for="product_name">Product Name:</label>
                                            <input type="text" class="form-control" id="product_name"
                                                name="product_name" required
                                                value="<?= $prod['product']['product_name'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="product_brand">Product Brand:</label>
                                            <input type="text" class="form-control" id="product_brand"
                                                name="product_brand" required
                                                value="<?= $prod['product']['product_brand'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="product_model">Product Model:</label>
                                            <input type="text" class="form-control" id="product_model"
                                                name="product_model" required
                                                value="<?= $prod['product']['product_model'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="product_type">Product Type:</label>
                                            <input type="text" class="form-control" id="product_type"
                                                name="product_type" required
                                                value="<?= $prod['product']['product_type'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="product_cooling_capacity">Cooling Capacity:</label>
                                            <input type="number" class="form-control" id="product_cooling_capacity"
                                                step=".01" name="product_cooling_capacity" required
                                                value="<?= $prod['product']['product_cooling_capacity'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="product_power_consumption">Power Consumption:</label>
                                            <input type="number" class="form-control" step=".01"
                                                id="product_power_consumption" name="product_power_consumption" required
                                                value="<?= $prod['product']['product_power_consumption'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="product_price">Product Price:</label>
                                            <input type="number" class="form-control" id="product_price" step=".01"
                                                name="product_price" required
                                                value="<?= $prod['product']['product_price'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="product_stock_quantity">Stock Quantity:</label>
                                            <input type="number" class="form-control" id="product_stock_quantity"
                                                name="product_stock_quantity" required
                                                value="<?= $prod['product']['product_stock_quantity'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="product_description">Product Description:</label>
                                            <textarea class="form-control" id="product_description"
                                                name="product_description" rows="3"
                                                required><?= $prod['product']['product_description'] ?></textarea>
                                        </div>
                                    </form>
                                    <h3>Images</h3>

                                    <div class="row">
                                    <?php foreach ($prod['product_images'] as $image) : ?>
                                        <div class="col-sm-6">
                                            
                                            <div class="card mb-3 mx-auto" style="width: auto;">
                                                <img style="width: 200px; height: 200px; object-fit: cover;" src="<?= base_url('public/admin/') . $image['product_image_name'] ?>"
                                                    class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">
                                                        <?= $image['product_image_name'] ?></h5>
                                                    <a href="/Admin/deleteImage/<?= $image['product_image_id'] ?>" class="btn btn-danger">Remove Image</a>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <?php endforeach; ?>
                                    </div>

                                  
                                </div>


                                <div class="card-footer text-right">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" value="Update">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="deleteModal<?= $prod['product']['product_id'] ?>" tabindex="-1"
                        role="dialog" aria-labelledby="editModalLabel<?= $prod['product']['product_id'] ?>"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel<?= $prod['product']['product_id'] ?>">Are
                                        you sure you want to Delete this product?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Name: <strong><?= $prod['product']['product_name'] ?></strong></p>
                                    <p>Brand: <strong><?= $prod['product']['product_brand'] ?></strong></p>
                                    <p>Model: <strong><?= $prod['product']['product_model'] ?></strong></p>
                                    <p>Type: <strong><?= $prod['product']['product_type'] ?></strong></p>
                                    <p>Cooling capacity:
                                        <strong><?= $prod['product']['product_cooling_capacity'] ?></strong>
                                    </p>
                                    <p>Power consumption:
                                        <strong><?= $prod['product']['product_power_consumption'] ?></strong>
                                    </p>
                                    <p>Price: <strong><?= $prod['product']['product_price'] ?></strong></p>
                                    <p>Quantity: <strong><?= $prod['product']['product_stock_quantity'] ?></strong></p>

                                </div>
                                <div class="card-footer text-right">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="/Admin/deleteProduct/<?= $prod['product']['product_id'] ?>"
                                        class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="viewModal<?= $prod['product']['product_id'] ?>" tabindex="-1"
                        role="dialog" aria-labelledby="viewModalLabel<?= $prod['product']['product_id'] ?>"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel<?= $prod['product']['product_id'] ?>">
                                        View Product</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body ">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <p>Name: <strong><?= $prod['product']['product_name'] ?></strong></p>
                                            <p>Brand: <strong><?= $prod['product']['product_brand'] ?></strong></p>
                                            <p>Model: <strong><?= $prod['product']['product_model'] ?></strong></p>
                                            <p>Type: <strong><?= $prod['product']['product_type'] ?></strong></p>
                                            <p>Cooling capacity:
                                                <strong><?= $prod['product']['product_cooling_capacity'] ?></strong>
                                            </p>
                                            <p>Power consumption:
                                                <strong><?= $prod['product']['product_power_consumption'] ?></strong>
                                            </p>
                                            <p>Price: <strong><?= $prod['product']['product_price'] ?></strong></p>
                                            <p>Quantity:
                                                <strong><?= $prod['product']['product_stock_quantity'] ?></strong>
                                            </p>
                                            <p>Description:
                                                <strong><?= $prod['product']['product_description'] ?></strong>
                                            </p>

                                        </div>
                                        <div class="col-lg-6">
                                            <p>Images</p>
                                            <div id="carouselExampleIndicators" class="carousel slide"
                                                data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    <?php foreach ($prod['product_images'] as $index => $image) : ?>
                                                    <li data-target="#carouselExampleIndicators"
                                                        data-slide-to="<?= $index ?>"
                                                        <?= $index === 0 ? 'class="active"' : '' ?>></li>
                                                    <?php endforeach; ?>
                                                </ol>
                                                <div class="carousel-inner">
                                                    <?php foreach ($prod['product_images'] as $index => $image) : ?>
                                                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                                        <img src="<?= base_url('public/admin/') . $image['product_image_name'] ?>"
                                                            style="object-fit: cover; width: 500px; margin:20px; height: 500px;"
                                                            alt="Image">
                                                    </div>
                                                    <?php endforeach; ?>
                                                </div>
                                                <a class="carousel-control-prev" href="#carouselExampleIndicators"
                                                    role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselExampleIndicators"
                                                    role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="card-footer text-right">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
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