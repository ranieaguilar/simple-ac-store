<?= $this->extend('client/layout') ?>
<?= $this->section('content') ?>
<section class="single-product-section layout-1 clearfix">
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="ttm-single-product-details">
                    <div class="ttm-single-product-info clearfix">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 ml-auto mr-auto">
                                <div class="product-gallery easyzoom-product-gallery">
                                    <div class="product-look-views left">
                                        <div class="mt-35 mb-35">
                                            <ul class="thumbnails easyzoom-gallery-slider"
                                                data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "arrows":true, "infinite":true, "vertical":true}'>
                                                <?php foreach($product_images as $image):?>
                                                <li>
                                                    <a href="<?= base_url('public/admin/') . $image['product_image_name']?>"
                                                        data-standard="<?= base_url('public/admin/') . $image['product_image_name']?>">
                                                        <img class="img-fluid"
                                                            src="<?= base_url('public/admin/') . $image['product_image_name']?>"
                                                            alt="" />
                                                    </a>
                                                </li>
                                                <?php endforeach;?>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-look-preview-plus right">
                                        <div class="pl-35 res-767-pl-15">
                                            <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
                                                <?php foreach ($product_images as $image): ?>
                                                <a
                                                    href="<?= base_url('public/admin/') . $image['product_image_name']?>">
                                                    <img class="img-fluid"
                                                        src="<?= base_url('public/admin/') . $image['product_image_name']?>"
                                                        alt="" />
                                                </a>
                                                <?php break; endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="summary entry-summary pl-30 res-991-pl-0 res-991-pt-40">
                                    <h2 class="product_title entry-title"><?= $item['product_name']?></h2>
                                    <!-- <div class="product_in-stock"><i class="fa fa-check-circle"></i><span> in Stock Only
                                            <?= $item['product_stock_quantity']?> left</span></div> -->
                                    <span class="price">
                                        <ins><span class="product-Price-amount">
                                                <span
                                                    class="product-Price-currencySymbol">$</span><?= $item['product_price']?>
                                            </span>
                                        </ins>

                                    </span>
                                    <div class="product-details__short-description"><?= $item['product_description']?>
                                    </div>
                                    <div class="mt-15 mb-25">
                                        <div class="quantity">
                                            <label>Stock: </label>
                                            </span><?= $item['product_stock_quantity']?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="pt-15">
                                        <h6>Item Features</h6>
                                        <ul class="ttm-list ttm-list-style-icon ttm-list-icon-color-skincolor">
                                            <li><i class="fa fa-check"></i><span class="ttm-list-li-content"><?= $item['product_power_consumption']?>W of power consumption.</span></li>
                                            <li><i class="fa fa-check"></i><span class="ttm-list-li-content"></span><?= $item['product_cooling_capacity']?> of cooling capacity</li>
                                            
                                        </ul>
                                    </div>
                                    <br>
                                    <div class="actions">
                                        <div class="add-to-cart">
                                            <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-fill ttm-btn-color-skincolor"
                                                href="/Client/like_item/<?= $item['product_id'] .'/'. session()->get('client_id')?>">Add to likes</a>
                                        </div>
                                    </div>
                                    <!-- <div class="buttons">
                                        <a href="#" rel="nofollow" data-product-id="24006456" data-product-type="simple"
                                            class="add_to_wishlist">
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                            <span class="wishlist-text">Add to Wish List</span>
                                        </a>
                                        <a href="#" class="compare button" data-product_id="24006456" rel="nofollow">
                                            <i class="fa fa-expand" aria-hidden="true"></i>
                                            <span class="compare-text">Compare</span>
                                        </a>
                                    </div> -->
                                    <!-- <div id="block-reassurance-1" class="block-reassurance">
                                        <ul>
                                            <li>
                                                <div class="block-reassurance-item">
                                                    <i class="fa fa-lock"></i>
                                                    <span>Security policy (edit with Customer reassurance module)</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="block-reassurance-item">
                                                    <i class="fa fa-truck"></i>
                                                    <span>Delivery policy (edit with Customer reassurance module)</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="block-reassurance-item">
                                                    <i class="fa fa-arrows-h"></i>
                                                    <span>Return policy (edit with Customer reassurance module)</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- row end -->
            </div>
</section>
<!-- single-product-section end -->
<?= $this->endSection() ?>