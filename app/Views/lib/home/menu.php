<section class="section_menu_today">
    <div class="container">
        <div class="row">
            <div class="heading">
                <h2 class="large_title">Menu hôm nay</h2>
                <span class="mini_title">Xem menu hôm nay</span>
            </div>
        </div>
    </div>
    <div class="tab_link_module">
        <div class="tabs-container tab_border">
            <span class="hidden-md hidden-lg button_show_tab">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </span>
            <span class="hidden-md hidden-lg title_check_tabs"></span>
            <div class="clearfix">
                <ul class="ul_link link_tab_check_click container">
                    <?php foreach ($categories as $key => $row) : ?>
                        <li class="li_tab">
                            <a href="#content-tabb<?= $key ?>" class="head-tabs head-tab<?= $key ?>" data-src=".head-tab<?= $key ?>"><?= $row->{pick_language($row, "name_")} ?></a>
                        </li>
                    <?php endforeach ?>


                </ul>
            </div>
        </div>
        <div class="tabs-content container">
            <?php foreach ($categories as $key => $category) : ?>
                <div id="content-tabb<?= $key ?>" class="content-tab content-tab-proindex" style="display:none;">
                    <div class="clearfix wrap_item_list row">
                        <?php foreach ($category->products as $row) : ?>
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
                        <div class="col-xs-12">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 a-center">
                                <a href="<?= url_product_list($category->id) ?>" title="Xem thêm" class="view_more_cls">Xem thêm <i class="fas fa-caret-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // $(".head-tabs").first().trigger("click");
        })
    </script>
</section>