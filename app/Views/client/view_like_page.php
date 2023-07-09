<?= $this->extend('client/layout') ?>
<?= $this->section('content') ?>
<section class="cart-section clearfix">
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <!-- cart_table -->
                <table class="table cart_table shop_table_responsive text-center">
                    <thead>
                        <tr>
                            <!-- <th class="">&nbsp;</th> -->
                            <th class="">Image</th>
                            <th class="">Product</th>
                            <th class="">Brand</th>
                            <th class="">Price</th>
                            <th class="">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($likes as $like):?>
                        <tr class="cart_item">
                            <td class="">
                                <a href="">
                                    <?php foreach ($like['product_images'] as $image): ?>
                                        <img class="img-fluid" src="<?= base_url('public/admin/') . $image['product_image_name'] ?>" alt="product-img" style="width: 80px; height: 80px; object-fit: cover;">
                                    <?php break; endforeach;?>
                                </a>
                            </td>
                            <td class="product-name" data-title="">
                                <a href="/Client/view_item/<?= $like['product']['product_id']?>"><strong><?= $like['product']['product_name']?></strong></a>
                                <span><?= $like['product']['product_description']?></span>
                            </td>
                            <td class="" data-title="">
                                <span class="">
                                    <span></span><?= $like['product']['product_brand']?>
                                </span>
                            </td>
                            <td class="" data-title="">
                                <span class="">
                                    <span class="">$</span><?= $like['product']['product_price']?>
                                </span>
                            </td>
                            <td class="product-remove">
                                <a href="/Client/remove_like/<?= $like['product']['like_item_id']?>" class="remove">×</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</section><!-- cart-section end-->
<?= $this->endSection() ?>