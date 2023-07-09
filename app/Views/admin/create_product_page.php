<?= $this->extend('Admin/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card card-waves border-left-primary">
            <div class="card-header ">
                Product Details
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="product_name">Product Name:</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" required>
                    </div>
                    <div class="form-group">
                        <label for="product_brand">Product Brand:</label>
                        <input type="text" class="form-control" id="product_brand" name="product_brand" required>
                    </div>
                    <div class="form-group">
                        <label for="product_model">Product Model:</label>
                        <input type="text" class="form-control" id="product_model" name="product_model" required>
                    </div>
                    <div class="form-group">
                        <label for="product_type">Product Type:</label>
                        <input type="text" class="form-control" id="product_type" name="product_type" required>
                    </div>
                    <div class="form-group">
                        <label for="product_cooling_capacity">Cooling Capacity:</label>
                        <input type="number" class="form-control" id="product_cooling_capacity" step=".01"
                            name="product_cooling_capacity" required>
                    </div>
                    <div class="form-group">
                        <label for="product_power_consumption">Power Consumption:</label>
                        <input type="number" class="form-control" step=".01" id="product_power_consumption"
                            name="product_power_consumption" required>
                    </div>
                    <div class="form-group">
                        <label for="product_price">Product Price:</label>
                        <input type="number" class="form-control" id="product_price" step=".01" name="product_price"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="product_stock_quantity">Stock Quantity:</label>
                        <input type="number" class="form-control" id="product_stock_quantity"
                            name="product_stock_quantity" required>
                    </div>
                    <div class="form-group">
                        <label for="product_description">Product Description:</label>
                        <textarea class="form-control" id="product_description" name="product_description" rows="3"
                            required></textarea>
                    </div>


            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        <div class="card border-left-primary">
            <div class="card-header ">
                Product Images
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="product_image">Product Images:</label>
                    <input type="file" class="form-control" id="product_image" name="product_image[]" multiple
                        accept=".jpg,.jpeg" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>