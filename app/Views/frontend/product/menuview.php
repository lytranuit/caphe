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
                        <li wfd-id="250"><strong><span wfd-id="251"><?= $category->{pick_language($category, 'name_')} ?></span></strong></li>
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
                    <h1 class="title-head margin-top-0"><?= $category->{pick_language($category, 'name_')} ?></h1>
                </div>
                <div class="category-products products f-left w_100 margin-top-70" wfd-id="78">
                    <section class="products-view products-view-grid" wfd-id="79">
                        <div class="row">

                            <?php foreach ($products as $row) : ?>
                                <div class="clear_ col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="wrp_item_small">
                                        <div class="product-box product_grid_2">
                                            <div class="product_mini_2 clearfix">
                                                <div class="img_product">
                                                    <a class="product-img" title="<?= $row->{pick_language($row, 'name_')} ?>">
                                                        <img class="lazyload loaded" src="<?= base_url(isset($row->image->src) ? $row->image->src : "assets/images/placeholder.png") ?>" data-src="<?= base_url(isset($row->image->src) ? $row->image->src : "assets/images/placeholder.png") ?>" alt="<?= $row->{pick_language($row, 'name_')} ?>" data-was-processed="true">
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <div class="infor_prd">
                                                        <h3 class="name_product">
                                                            <a title="<?= $row->{pick_language($row, 'name_')} ?>" class="product-name">
                                                                <span class="name_product"><?= $row->{pick_language($row, 'name_')} ?></span>
                                                            </a>
                                                        </h3>
                                                    </div>
                                                    <div class="price_base ">

                                                        <div class="price-box clearfix">
                                                            <div class="special-price">
                                                                <span class="price product-price"><?= number_format($row->price, 0, ",", "."); ?>₫</span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="summary_grid">
                                                        <div class="rte description text2line">
                                                            <?= split_string($row->{pick_language($row, 'element_')}, 50) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
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