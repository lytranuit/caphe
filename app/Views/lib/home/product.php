<!-- 2 -->
<div class="home-section-wrapper">
    <div class="container">
        <div class="home-section home-section--products">
            <div class="text-center pb-3">
                <h2 class="a360-ld-st__title">Sản phẩm tiêu biểu</h2>
            </div>
            <div class="home-section__content">
                <div class="c-slider--products">

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
            <div class="home-section__footer">
                <div class="text-center">
                    <a href="<?= url_product_list(0) ?>" class="btn btn-default">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>
</div>