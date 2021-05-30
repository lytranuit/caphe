<div class="section_sanpham">
    <div class="container">
        <div class="row">.
            <?php foreach ($categories as $category) : ?>
                <div class="col-lg-12" style="margin-bottom:20px">
                    <div class="m_product pt-xl-7 pb-2 pt-5 " wfd-id="492">
                        <h2 class="title mb-5 text-uppercase font-weight-bold text-center">
                            <a class="position-relative banner-w modal-open" href="<?= url_product_list($category->id) ?>" title="<?= $category->{pick_language($category, 'name_')} ?>"><?= $category->{pick_language($category, 'name_')} ?></a>
                        </h2>
                        <div class="b_product swiper-container" wfd-id="493">
                            <div class="swiper-wrapper">

                                <?php foreach ($category->products as $row) : ?>
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
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            var b_product = new Swiper('.b_product', {
                spaceBetween: 10,
                loop: false,
                speed: 1000,
                navigation: {
                    nextEl: '.b1_next',
                    prevEl: '.b1_prev',
                },
                slidesPerView: 2,
                autoplay: false,
                breakpoints: {
                    576: {
                        slidesPerView: 2
                    },
                    768: {
                        slidesPerView: 3
                    },
                    992: {
                        slidesPerView: 3
                    },
                    1200: {
                        slidesPerView: 5
                    }
                }
            });
        });
    </script>
</div>