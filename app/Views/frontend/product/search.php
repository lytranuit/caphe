<?= $this->extend('frontend/layouts/main') ?>


<?= $this->section('content') ?>

<div class="breadcrumb_nobackground margin-bottom-40" wfd-id="244">
    <section class="bread-crumb" wfd-id="245">
        <span class="crumb-border" wfd-id="255"></span>
        <div class="container" wfd-id="246">
            <div class="row" wfd-id="247">
                <div class="col-xs-12 a-left" wfd-id="248">
                    <ul class="breadcrumb" wfd-id="249">
                        <li class="home" wfd-id="252">
                            <a href="/"><span wfd-id="254">Trang chủ</span></a>
                            <span class="mr_lr" wfd-id="253"><i class="fas fa-circle"></i></span>
                        </li>
                        <li wfd-id="250"><strong><span wfd-id="251"><?= $search ?></span></strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="container" wfd-id="74">
    <div class="row" wfd-id="75">
        <div class="bg_collection collection_2" wfd-id="76">

            <div class="main_container col-lg-12 padding-col-left-0" wfd-id="77">
                <div class="box-heading relative heading" wfd-id="243">
                    <h1 class="title-head margin-top-0">Tìm kiếm : <b><?= $search ?></b></h1>
                </div>
                <div class="category-products products f-left w_100 margin-top-70" wfd-id="78">
                    <section class="products-view products-view-grid" wfd-id="79">
                        <div class="row">

                            <?php foreach ($products as $row) : ?>
                                <div class="clear_ col-xs-6 col-sm-6 col-md-4 col-lg-3">
                                    <div class="product-item position-relative product-item-main" style="">
                                        <a href="<?= url_product($row->product_id) ?>" class="thumb flip effect-ming d-block" title="<?= $row->{pick_language($row, 'name_')} ?>">
                                            <div class="item-image position-relative w-100 m-0 aspect ratio1by1" wfd-id="602">
                                                <img src="<?= base_url(isset($row->image->src) ? $row->image->src : "assets/images/placeholder.png") ?>" data-src="<?= base_url(isset($row->image->src) ? $row->image->src : "assets/images/placeholder.png") ?>" class="d-block image-1 img img-contain position-absolute w-100 h-100 lazy" alt="<?= $row->{pick_language($row, 'name_')} ?>">
                                                <div class="w-100 h-100 overlay" wfd-id="603"></div>
                                            </div>
                                        </a>
                                        <div class="item-info text-left p-2" wfd-id="593">
                                            <div class="item-title font-weight-bold m-0 line_1 mt-1">
                                                <a class="d-block name_product" href="<?= url_product($row->product_id) ?>" title="<?= $row->{pick_language($row, 'name_')} ?>"><?= $row->{pick_language($row, 'name_')} ?></a>
                                            </div>
                                            <div class="item-content" wfd-id="594">
                                                <div class="item-price mt-1" wfd-id="595">
                                                    <span class="special-price font-weight-bold" wfd-id="596"><?= number_format($row->price, 0, ",", "."); ?>₫</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </section>
                </div>
                <div class="text-center" wfd-id="80">
                    <?= $pager->links() ?>
                </div>

                </section>

            </div>
        </div>

    </div>
</div>
</div>
<?= $this->endSection() ?>

<?= $this->section("script") ?>
<?= $this->endSection() ?>