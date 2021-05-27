<?= $this->extend('frontend/layouts/main') ?>


<?= $this->section('content') ?>

<div class="breadcrumb-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?= base_url() ?>">Trang chủ</a></li>

            <li class="active"><?= $info->{pick_language($info, "name_")} ?></li>
        </ol>
    </div>
</div>
<div class="product-single">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-wrap">
                    <div class="product-single-container product-single-default">
                        <div class="row">
                            <div class="col-md-12 product-single-gallery">
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
                            <div class="col-md-12">
                                <div class="product-single-details text-center">
                                    <h1 class="product-title"><?= $info->{pick_language($info, "name_")} ?></h1>
                                    <div class="product-code">
                                        <div class="product-code__label">Mã sản phẩm</div>
                                        <div class="product-code__data"><?= $info->code ?></div>
                                    </div>
                                    <div>Giá sản phẩm
                                        : <?= number_format($info->price, 0, ",", "."); ?> đồng</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-section-wrap">
                    <div class="product-single-section">
                        <div class="p-section-content">
                            <?php if ($info->{pick_language($info, "description_")} != "") : ?>
                                <div class="p-single-desrc">
                                    <h3 class="p-single-desrc__title">Mô tả</h3>
                                    <div class="p-single-desrc__wrap">
                                        <?= $info->{pick_language($info, "description_")} ?>
                                    </div>
                                </div>
                            <?php endif ?>

                            <?php if ($info->{pick_language($info, "element_")} != "") : ?>
                                <div class="p-single-desrc">
                                    <h3 class="p-single-desrc__title">Thành phần</h3>
                                    <div class="p-single-desrc__wrap">
                                        <?= $info->{pick_language($info, "element_")} ?>
                                    </div>
                                </div>

                            <?php endif ?>

                            <?php if ($info->{pick_language($info, "uses_")} != "") : ?>
                                <div class="p-single-desrc">
                                    <h3 class="p-single-desrc__title">Công dụng</h3>
                                    <div class="p-single-desrc__wrap">
                                        <?= $info->{pick_language($info, "uses_")} ?>
                                    </div>
                                </div>
                            <?php endif ?>

                            <?php if ($info->{pick_language($info, "guide_")} != "") : ?>
                                <div class="p-single-desrc">
                                    <h3 class="p-single-desrc__title">Hướng dẫn sử dụng</h3>
                                    <div class="p-single-desrc__wrap">
                                        <?= $info->{pick_language($info, "guide_")} ?>
                                    </div>
                                </div>
                            <?php endif ?>

                        </div>
                    </div>
                </div>
                <hr>
                <div class="product-single-section">
                    <div class="p-section-header">
                        <h3 class="p-section-title">Có thể bạn quan tâm</h3>
                    </div>
                    <div class="p-section-content">
                        <div class="c-slider--products--related">
                            <?php foreach ($products as $row) : ?>
                                <div class="single-product single-card c-slider__item">
                                    <a href="<?= url_product($row->id) ?>" class="single-card__link" tabindex="0">
                                        <div class="single-product__image h-rectangle">
                                            <div class="image-wrap h-rectangle__inner h-bg-cover" style="background-image: url(<?= base_url(isset($row->image->src) ? $row->image->src : "assets/images/placeholder.png") ?>);"></div>
                                        </div>
                                        <div class="single-product__content">
                                            <div class="single-product__title"><?= $row->{pick_language($row, 'name_')} ?>
                                            </div>
                                            <div class="single-product__subtitle"><?= $row->code ?></div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>




<?= $this->section("style") ?>

<link rel="stylesheet" href="<?= base_url("assets/lib/ckeditor/contents.css") ?> " ?>
<?= $this->endSection() ?>
<?= $this->section("script") ?>
<script>
    $(document).ready(function() {
        // slide: home products
        $('.content--slide-images-2').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: true,
            prevArrow: '<span class="c-slider__arrow c-slider__arrow--prev"><i class="fas fa-chevron-left"></i></span>',
            nextArrow: '<span class="c-slider__arrow c-slider__arrow--next"><i class="fas fa-chevron-right"></i></span>',
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 4,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                    }
                }
            ],
        });
        // slide: home products
        $('.c-slider--products--related').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            arrows: true,
            prevArrow: '<span class="c-slider__arrow c-slider__arrow--prev"><i class="fas fa-chevron-left"></i></span>',
            nextArrow: '<span class="c-slider__arrow c-slider__arrow--next"><i class="fas fa-chevron-right"></i></span>',
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 4,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                    }
                }
            ],
        });
    })
</script>
<?= $this->endSection() ?>