<!-- 8 -->
<!-- 3 -->
<div class="home-section-wrapper">
    <div class="container">
        <div class="home-section home-section--products">
            <div class="text-center pb-3">
                <h2 class="a360-ld-st__title">Tin tức</h2>
            </div>
            <div class="home-section__content">

                <div class="c-slider--news">

                    <?php foreach ($news as $row) : ?>
                        <div class="c-slider__col">
                            <div class="single-news single-card c-slider__item ">
                                <a href="<?= url_news($row->id) ?>" class="single-card__link" tabindex="-1">
                                    <div class="single-news__image h-rectangle h-rectangle--r21">
                                        <div class="image-wrap h-rectangle__inner h-bg-cover" style="background-image:url(<?= base_url(isset($row->image->src) ? $row->image->src : "assets/images/placeholder.png") ?>);"></div>
                                    </div>
                                    <div class="single-news__content">
                                        <div class="single-news__title"><?= $row->{pick_language($row, 'title_')} ?></div>
                                        <div class="single-news__excerpt"><?= split_string($row->{pick_language($row, 'content_')}, 50) ?></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="home-section__footer">
                <div class="text-center">
                    <a href="<?= url_news_list(0) ?>" class="btn btn-default">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>
</div>