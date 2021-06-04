<?= $this->extend('frontend/layouts/main') ?>


<?= $this->section('content') ?>
<div class="breadcrumb_nobackground margin-bottom-40">
    <section class="bread-crumb">
        <span class="crumb-border"></span>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 a-left">
                    <ul class="breadcrumb">
                        <li class="home">
                            <a href="<?= base_url() ?>"><span>Trang chủ</span></a>
                            <span class="mr_lr"><i class="fas fa-circle"></i></span>
                        </li>
                        <li><strong><span><?= $info->{pick_language($info, "name_")} ?></span></strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>
<section class="product margin-top-5 f-left w_100">
    <div class="container">
        <div class="row">
            <div class="details-product">
                <div class="product-detail-left product-images col-xs-12 col-sm-6 col-md-6 col-lg-6">

                    <div class="swiper-container gallery-top swiper-container-initialized swiper-container-horizontal">
                        <div class="swiper-wrapper" id="lightgallery" aria-live="polite">
                            <a class="swiper-slide" title="Click để xem" role="group">
                                <img src="<?= base_url(isset($info->image->src) ? $info->image->src : "assets/images/placeholder.png") ?>" data-src="<?= base_url(isset($info->image->src) ? $info->image->src : "assets/images/placeholder.png") ?>" alt="Cà phê Trứng" data-image="<?= base_url(isset($info->image->src) ? $info->image->src : "assets/images/placeholder.png") ?>" class="img-responsive mx-auto d-block lazyload loaded" data-was-processed="true">
                            </a>
                            <?php foreach ($info->image_other as $row) : ?>
                                <a class="swiper-slide" title="Click để xem" role="group">
                                    <img src="<?= base_url(isset($row->src) ? $row->src : "assets/images/placeholder.png") ?>" data-src="<?= base_url(isset($row->src) ? $row->src : "assets/images/placeholder.png") ?>" alt="Cà phê Trứng" data-image="<?= base_url(isset($row->src) ? $row->src : "assets/images/placeholder.png") ?>" class="img-responsive mx-auto d-block lazyload loaded" data-was-processed="true">
                                </a>
                            <?php endforeach ?>
                        </div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                    <div class="swiper-container gallery-thumbs swiper-container-initialized swiper-container-horizontal swiper-container-thumbs">
                        <div class="swiper-wrapper" id="swiper-wrapper-7123e85545c32ce7" aria-live="polite">
                            <div class="swiper-slide swiper-slide-visible swiper-slide-active swiper-slide-thumb-active" role="group">
                                <img src="<?= base_url(isset($info->image->src) ? $info->image->src : "assets/images/placeholder.png") ?>" data-src="<?= base_url(isset($info->image->src) ? $info->image->src : "assets/images/placeholder.png") ?>" alt="Cà phê Trứng" data-image="<?= base_url(isset($info->image->src) ? $info->image->src : "assets/images/placeholder.png") ?>" class="lazyload loaded" data-was-processed="true">
                            </div>
                            <?php foreach ($info->image_other as $row) : ?>
                                <div class="swiper-slide swiper-slide-visible swiper-slide-active swiper-slide-thumb-active" role="group">
                                    <img src="<?= base_url(isset($row->src) ? $row->src : "assets/images/placeholder.png") ?>" data-src="<?= base_url(isset($row->src) ? $row->src : "assets/images/placeholder.png") ?>" alt="Cà phê Trứng" data-image="<?= base_url(isset($row->src) ? $row->src : "assets/images/placeholder.png") ?>" class="lazyload loaded" data-was-processed="true">
                                </div>
                            <?php endforeach ?>
                        </div>

                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>


                </div>
                <div class="product-detail-left product-images col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="product-single-gallery">
                        <div class="content--slide-images-2">
                            <div class="single-image">
                                <a href="<?= base_url(isset($info->image->src) ? $info->image->src : "assets/images/placeholder.png") ?>" data-fancybox="product-log-gallery-01" tabindex="0">
                                    <span class="h-rectangle"><span class="h-rectangle__inner h-bg-cover" style="background-image: url(<?= base_url(isset($info->image->src) ? $info->image->src : "assets/images/placeholder.png") ?>);"></span></span>
                                </a>
                            </div>
                            <?php foreach ($info->image_other as $row) : ?>
                                <div class="single-image">
                                    <a href="<?= base_url(isset($row->src) ? $row->src : "assets/images/placeholder.png") ?>" data-fancybox="product-log-gallery-01" tabindex="0">
                                        <span class="h-rectangle"><span class="h-rectangle__inner h-bg-cover" style="background-image: url(<?= base_url(isset($row->src) ? $row->src : "assets/images/placeholder.png") ?>);"></span></span>
                                    </a>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5 col-md-offset-1 col-lg-offset-1 details-pro style_product">
                    <div class="f-left w_100">
                        <h1 class="title-product"><?= $info->{pick_language($info, "name_")} ?></h1>
                        <div class="product-code">
                            <div class="product-code__label">Mã sản phẩm: <b><?= $info->code ?></b></div>
                        </div>
                        <div class="price-box">

                            <div class="special-price"><span class="price product-price"><?= number_format($info->price, 0, ",", "."); ?>₫</span>
                            </div> <!-- Giá -->

                        </div>
                    </div>
                    <div class="form-product col-sm-12 product" data-id="<?= $info->id ?>">
                        <div id="add-to-cart-form" class="form-inline margin-bottom-0">
                            <div class="form-group form_button_details">
                                <div class="form_product_content f-left w_100 ">
                                    <div class="count_btn_style">
                                        <div class="custom input_number_product soluong1 show">
                                            <button class="btn_num num_1 button button_qty" onclick="var result = document.getElementById('qtym'); var qtypro = result.value; if( !isNaN( qtypro ) &amp;&amp; qtypro > 1 ) result.value--;return false;" type="button">-</button>
                                            <input type="text" id="qtym" value="1" class="form-control prd_quantity number" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" onchange="if(this.value == 0)this.value=1;">
                                            <button class="btn_num num_2 button button_qty" onclick="var result = document.getElementById('qtym'); var qtypro = result.value; if( !isNaN( qtypro )) result.value++;return false;" type="button">+</button>
                                        </div>
                                        <div class="button_actions clearfix">
                                            <button type="submit" class="btn btn_add_cart btn-cart add_to_cart btn_base">
                                                <span class="btn-content">Đặt hàng</span>
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <b class="b_infor">Thông tin:</b>
                    <div class="product-summary product_description margin-bottom-0">
                        <div class="rte description ">
                            <?= $info->{pick_language($info, "element_")} ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- SP LIÊN QUAN -->
    <div class="bg_related">
        <div class="container">
            <div class="row">
                <div class="related-product margin-bottom-40 col-lg-12">
                    <div class="section_prd_feature body_recent_base">
                        <div class="module-header a-center">
                            <div class="heading title_product_base">
                                <h2>
                                    <span0 href="/" title="Cafe cùng loại">Sản phẩm cùng loại</span>
                                </h2>
                            </div>
                        </div>

                        <div class="products product_related products-view-grid-bb swiper-container">
                            <div class="swiper-wrapper" id="swiper-wrapper-cdd07ff5d6b63769" aria-live="polite">
                                <?php foreach ($products as $row) : ?>
                                    <div class="swiper-slide">
                                        <div class="product-item position-relative product-item-main mb-3">
                                            <a href="<?= url_product($row->id) ?>" class="thumb flip effect-ming d-block" title="<?= $row->{pick_language($row, 'name_')} ?>">
                                                <div class="item-image position-relative w-100 m-0 aspect ratio1by1" wfd-id="602">
                                                    <img src="<?= base_url(isset($row->image->src) ? $row->image->src : "assets/images/placeholder.png") ?>" data-src="<?= base_url(isset($row->image->src) ? $row->image->src : "assets/images/placeholder.png") ?>" class="d-block image-1 img img-contain position-absolute w-100 h-100 lazy" alt="<?= $row->{pick_language($row, 'name_')} ?>">
                                                    <div class="w-100 h-100 overlay" wfd-id="603"></div>
                                                </div>
                                            </a>
                                            <div class="item-info text-left p-2" wfd-id="593">
                                                <div class="item-title font-weight-bold m-0 line_1 mt-1">
                                                    <a class="d-block name_product" href="<?= url_product($row->id) ?>" title="<?= $row->{pick_language($row, 'name_')} ?>"><?= $row->{pick_language($row, 'name_')} ?></a>
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
                            <div class="swiper-button-prev b1_prev" tabindex="-1" role="button" aria-label="Previous slide" aria-disabled="true" wfd-id="496"></div>
                            <div class="swiper-button-next b1_next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false" wfd-id="495"></div>

                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- END SP LIÊN QUAN -->


    <script>
        var swiper = new Swiper('.product_related', {
            slidesPerView: 5,
            spaceBetween: 30,
            grabCursor: false,
            navigation: {
                nextEl: '.product_related .swiper-button-next',
                prevEl: '.product_related .swiper-button-prev',
            },
            breakpoints: {
                1199: {
                    slidesPerView: 5,
                    spaceBetween: 30,
                    touchRatio: 1,
                    loop: false,
                },
                991: {
                    slidesPerView: 4,
                    spaceBetween: 40,
                    touchRatio: 1,
                    loop: false,
                },
                767: {
                    slidesPerView: 2,
                    spaceBetween: 35,
                    touchRatio: 1,
                    loop: false,
                },
                480: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                    touchRatio: 1,
                    loop: false,
                },
                320: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                    touchRatio: 1,
                    loop: false,
                }
            }
        });
    </script>


    <div class="container">
        <div class="row">
            <div class="tab_h">

                <div class="col-xs-12 col-lg-12 col-sm-12 col-md-12">
                    <!-- Nav tabs -->
                    <div class="product-tab e-tabs">
                        <ul class="tabs tabs-title clearfix">

                            <li class="tab-link current" data-tab="tab-1">
                                <h3><span>Mô tả sản phẩm</span></h3>
                            </li>


                            <li class="tab-link" data-tab="tab-2">
                                <h3><span>Đánh giá</span></h3>
                            </li>

                        </ul>


                        <div id="tab-1" class="tab-content current">
                            <div class="rte">

                                <?= $info->{pick_language($info, "desciption_")} ?>
                            </div>
                        </div>


                        <div id="tab-2" class="tab-content">
                            <div class="rte">
                                <div id="bizweb-product-reviews" class="bizweb-product-reviews" data-id="14026015">
                                    <div>
                                        <div class="title-bl">
                                            <h4>Đánh giá sản phẩm</h4>
                                        </div>
                                        <div id="bizweb-product-reviews-sub">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>




<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("script") ?>
<script>
    var galleryThumbs = new Swiper('.gallery-thumbs', {
        spaceBetween: 5,
        slidesPerView: 10,
        lazy: true,
        hashNavigation: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        loop: false,
        loopAdditionalSlides: 0,
        breakpoints: {
            300: {
                slidesPerView: 4,
                spaceBetween: 10
            },
            500: {
                slidesPerView: 4,
                spaceBetween: 10
            },
            640: {
                slidesPerView: 5,
                spaceBetween: 10
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 10
            },
            1024: {
                slidesPerView: 5,
                spaceBetween: 10
            },
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
    var galleryTop = new Swiper('.gallery-top', {
        spaceBetween: 0,
        lazy: true,
        hashNavigation: true,
        thumbs: {
            swiper: galleryThumbs
        }
    });


    jQuery(function($) {



        $('.selector-wrapper').hide();

        $('.selector-wrapper').css({
            'text-align': 'left',
            'margin-bottom': '15px'
        });
    });
    jQuery('.swatch :radio').change(function() {
        var optionIndex = jQuery(this).closest('.swatch').attr('data-option-index');
        var optionValue = jQuery(this).val();
        jQuery(this)
            .closest('form')
            .find('.single-option-selector')
            .eq(optionIndex)
            .val(optionValue)
            .trigger('change');
    });
</script>
<?= $this->endSection() ?>