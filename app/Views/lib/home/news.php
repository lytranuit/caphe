<div class="section_blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="a-center">
                    <div class="heading">
                        <h2 class="title-head">
                            <a href="tin-tuc" title="Tin tức">Tin tức</a>
                        </h2>
                    </div>
                </div>
                <div class="wrap_list_vertical content-blog-index blog_left">
                    <div class="wrap_owl_blog swiper-container">
                        <div class="swiper-wrapper" id="swiper-wrapper-b732ca32b63d9159" aria-live="polite">
                            <?php foreach ($news as $row) : ?>
                                <div class="swiper-slide" role="group" aria-label="1/2">
                                    <div class="blog_index">
                                        <div class="myblog">
                                            <div class="image-blog-left a-center">

                                                <a class="img_bot" href="<?= url_news($row->id) ?>">
                                                    <img class="lazyload" src="<?= base_url(isset($row->image->src) ? $row->image->src : "assets/images/placeholder.png") ?>" data-src="<?= base_url(isset($row->image->src) ? $row->image->src : "assets/images/placeholder.png") ?>" title="<?= $row->{pick_language($row, 'title_')} ?>" alt="<?= $row->{pick_language($row, 'title_')} ?>" data-was-processed="true">
                                                </a>

                                            </div>
                                            <div class="content_blog">
                                                <div class="content_right">
                                                    <span class="short_time">
                                                        <i class="fas fa-calendar-alt"></i> <?= date("d/m/Y", strtotime($row->date)) ?>
                                                    </span>
                                                    <h3>
                                                        <a href="<?= url_news($row->id) ?>" title="<?= $row->{pick_language($row, 'title_')} ?>"><?= $row->{pick_language($row, 'title_')} ?></a>
                                                    </h3>
                                                </div>
                                                <div class="summary_item_blog">
                                                    <?= split_string($row->{pick_language($row, 'content_')}, 100) ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <div class="swiper-button-prev b1_prev swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-disabled="true" wfd-id="496" aria-controls="swiper-wrapper-5ce9aa27a355c866"></div>

                        <div class="swiper-button-next b1_next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false" wfd-id="495" aria-controls="swiper-wrapper-5ce9aa27a355c866"></div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var swiper = new Swiper('.wrap_owl_blog', {
            slidesPerView: 2,
            spaceBetween: 30,
            grabCursor: false,
            navigation: {
                nextEl: '.wrap_owl_blog .swiper-button-next',
                prevEl: '.wrap_owl_blog .swiper-button-prev',
            },
            breakpoints: {
                1199: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                    touchRatio: 1,
                    loop: false,
                },
                991: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                    touchRatio: 1,
                    loop: false,
                },
                767: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                    touchRatio: 1,
                    loop: false,
                },
                480: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                    touchRatio: 1,
                    loop: false,
                },
                320: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                    touchRatio: 1,
                    loop: false,
                }
            }
        });
    </script>
</div>