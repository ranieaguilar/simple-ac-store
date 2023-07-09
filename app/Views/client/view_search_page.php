<?= $this->extend('client/layout') ?>
<?= $this->section('content') ?>
<section class="shop-views-section clearfix">
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="ttm-shop-toolbar-wrapper">
                    <div class="row">
                        <div class="col-md-6 toolbar-left">
                            <div class="nav-tab-wrapper">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#grid" role="tab"
                                            aria-selected="true"><i class="ti ti-layout-grid2-alt"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#list" role="tab"
                                            aria-selected="false"><i class="ti ti-menu-alt"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <form class="products-result-count" method="get">
                                <div class="orderby">
                                    <label>Show: </label>
                                    <select name="orderby" class="select2-hidden-accessible">
                                        <option value="0" selected="selected">01</option>
                                        <option value="showtby">14</option>
                                        <option value="showtby">15</option>
                                        <option value="showtby">16</option>
                                        <option value="showtby">17</option>
                                        <option value="showtby">18</option>
                                        <option value="showtby">19</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <!-- <div class="col-md-6 toolbar-right">
                            <form class="products-ordering text-right" method="get">
                                <div class="orderby">
                                    <label>Sort by: </label>
                                    <select name="orderby" class="select2-hidden-accessible">
                                        <option value="menu_order" selected="selected">Sales High To low</option>
                                        <option value="sortby">price: low to high</option>
                                        <option value="sortby">price: high to low</option>
                                    </select>
                                </div>
                            </form>
                        </div> -->
                    </div>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="grid" role="tabpanel">
                        <div class="row">

                            <?php foreach($products as $prod):?>
                            <div class="product col-md-3 col-sm-6 col-xs-12">
                                <div class="product-box">
                                    <!-- product-box-inner -->
                                    <div class="product-box-inner">
                                        <div class="product-image-box">
                                            <?php foreach ($prod['product_images'] as $image): ?>



                                            <img class="img-fluid"
                                                src="<?= base_url('public/admin/') . $image['product_image_name'] ?>"
                                                alt="" style="width: 300px; height: 300px; object-fit: cover;">
                                            <?php break; endforeach;?>
                                        </div>
                                        <div class="product-btn-links-wrapper">
                                            <div class="product-btn"><a href="<?= base_url('Client/view_item/') . $prod['product']['product_id']?>"
                                                    class="quick-view-btn tooltip-top"
                                                    data-tooltip="view"><i class="ti ti-eye"></i></a>
                                            </div>
                                            <div class="product-btn"><a href="/Client/like_item/<?= $prod['product']['product_id'] .'/'. session()->get('client_id')?>" class="wishlist-btn tooltip-top"
                                                    data-tooltip="Add To likes"><i class="ti ti-heart"></i></a>
                                            </div>
                                        </div>
                                    </div><!-- product-box-inner end -->
                                    <div class="product-content-box">
                                        <a class="product-title" href="<?= base_url('Client/view_item/') . $prod['product']['product_id']?>">
                                            <h2><?= $prod['product']['product_name'] ?></h2>
                                        </a>
                                        <!-- <div class="star-ratings">
                                            <ul class="rating">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div> -->
                                        <span class="price">
                                            <span class="product-Price-amount">
                                                <span class="product-Price-currencySymbol">$
                                                </span><?= $prod['product']['product_price'] ?>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- product end -->
                            <?php endforeach;?>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="list" role="tabpanel">
                        <div class="product-list product res-991-pt-0">
                            <!-- product-box -->
                            <?php foreach($products as $prod):?>
                            <div class="product-box">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <!-- product-box-inner -->
                                        <div class="product-box-inner">
                                            <div class="product-image-box">
                                                <?php foreach ($prod['product_images'] as $image): ?>



                                                <img class="img-fluid"
                                                    src="<?= base_url('public/admin/') . $image['product_image_name'] ?>"
                                                    alt="" style="width: 300px; height: 300px; object-fit: cover;">
                                                <?php break; endforeach;?>
                                            </div>
                                        </div><!-- product-box-inner end -->
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-7">
                                        <div class="product-description">
                                            <div class="product-content-box">
                                                <a class="product-title" href="product-layout1.html">
                                                    <h2><?= $prod['product']['product_name'] ?></h2>
                                                </a>

                                                <span class="price">
                                                    <ins><span class="product-Price-amount">
                                                            <span class="product-Price-currencySymbol">$</span><?= $prod['product']['product_price'] ?>
                                                        </span>
                                                    </ins>
                                                </span>
                                                <p><?= $prod['product']['product_description'] ?></p>
                                                <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-fill ttm-icon-btn-right ttm-btn-color-skincolor mt-15"
                                                    href="<?= base_url('Client/view_item/') . $prod['product']['product_id']?>" title="">View Item<i
                                                        class="themifyicon ti-shopping-cart-full"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- product-box end -->
                            <?php endforeach;?>

                        </div>
                    </div>
                </div>
                <div class="pagination-block res-991-mt-0">
                    <span class="page-numbers current">1</span>
                    <a class="page-numbers" href="#">2</a>
                    <a class="page-numbers" href="#">3</a>
                    <a class="next page-numbers" href="#"><i class="ti ti-arrow-right"></i></a>
                </div>
            </div>
        </div><!-- row end -->
    </div>
</section>
<?= $this->endSection() ?>