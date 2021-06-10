<section class="section_feedback">
    <div class="container">
        <div class="row">
            <div class="heading">
                <h2>Khách hàng nói gì</h2>
            </div>

            <!-- <div class="swiper-container gallery-thumbs swiper-container-initialized swiper-container-horizontal swiper-container-free-mode swiper-container-thumbs">
                <div class="swiper-wrapper" id="swiper-wrapper-b5a6d12f8de43431" aria-live="polite">
                    <?php foreach ($feedback as $row) : ?>
                        <div class="swiper-slide item thumb_small swiper-slide-visible swiper-slide-active swiper-slide-thumb-active" role="group">
                            <a href="javascript:;" class="clearfix">
                                <img class="lazyload" src="<?= base_url(isset($row->image->src) ? $row->image->src : "assets/images/placeholder.png") ?>" data-src="<?= base_url(isset($row->image->src) ? $row->image->src : "assets/images/placeholder.png") ?>" alt="<?= $row->name ?>" data-was-processed="true">
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div> -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- Swiper -->
                <div class="swiper-container gallery-top swiper-container-initialized swiper-container-horizontal">
                    <div class="swiper-wrapper" id="swiper-wrapper-9f6b101bcbf12b1c9" aria-live="polite">
                        <?php foreach ($feedback as $row) : ?>
                            <div class="item swiper-slide swiper-slide-active" role="group">
                                <div class="row">
                                    <div class="image_thumb_bb col-lg-12">
                                        <a href="javascript:;" class="img_large clearfix">
                                            <img class="lazyload" src="<?= base_url(isset($row->image->src) ? $row->image->src : "assets/images/placeholder.png") ?>" data-src="<?= base_url(isset($row->image->src) ? $row->image->src : "assets/images/placeholder.png") ?>" alt="<?= $row->name ?>" data-was-processed="true">
                                        </a>
                                    </div>
                                    <div class="content_thumb_bb col-lg-12">
                                        <div class="content_danhgia">
                                            <span><?= $row->name ?></span>
                                            <p><?= $row->content ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <!-- Add Arrows -->

                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                </div>
                <!-- Initialize Swiper -->
            </div>
        </div>
    </div>
    <script>
        // var galleryThumbs = new Swiper('.gallery-thumbs', {
        //     spaceBetween: 30,
        //     slidesPerView: 3,
        //     loop: false,
        //     freeMode: true,
        //     loopedSlides: 3, //looped slides should be the same
        //     watchSlidesVisibility: true,
        //     watchSlidesProgress: true,
        // });
        var galleryTop = new Swiper('.gallery-top', {
            spaceBetween: 0,
            loop: false,
            loopedSlides: 3, //looped slides should be the same
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            // thumbs: {
            //     swiper: galleryThumbs,
            // },
        });
    </script>
</section>