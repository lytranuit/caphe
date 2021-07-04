<?= $this->extend('frontend/layouts/main') ?>


<?= $this->section('content') ?>

<div class="section_slider">
    <div class="home-slider section_slider swiper-container">
        <div class="swiper-wrapper" id="swiper-wrapper-1375be3df72c34ff">

            <div class="swiper-slide" role="group" aria-label="2 / 2">
                <a href="#" class="clearfix" title="Slider 2">
                    <picture>
                        <source media="(max-width: 767px)" srcset="<?= base_url("assets/userfiles/images/4164343.png") ?>">
                        <img src="<?= base_url("assets/userfiles/images/4164343.png") ?>" alt="Slider 1">
                    </picture>
                </a>
            </div>
            <div class="swiper-slide" role="group" aria-label="1 / 2">
                <a href="#" class="clearfix" title="Slider 1">
                    <picture>
                        <source media="(max-width: 767px)" srcset="<?= base_url("assets/images/slider_1.jpg") ?>">
                        <img src="<?= base_url("assets/images/slider_1.jpg") ?>" alt="Slider 1">
                    </picture>
                </a>
            </div>

        </div>
    </div>
    <script>
        var swiper = new Swiper('.home-slider', {
            autoplay: {
                delay: 4500,
                disableOnInteraction: false
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.home-slider .swiper-button-next',
                prevEl: '.home-slider .swiper-button-prev',
            }
        });
    </script>
</div>
<?= view_cell("\App\Libraries\HomeWidget::product") ?>

<div class="section_about">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                <div class="module_left a-center">
                    <div class="heading">
                        <h2 class="large_title">Chúng tôi là</h2>
                        <span class="mini_title">Huy tùng Coffee</span>
                    </div>
                    <div class="day_time">
                        Thứ hai đến Chủ nhật <b>6:00am - 11:00pm</b> <span class="hidden-xs">|</span>
                        Hotline:
                        <a href="tel:0913445558">0913.445.558</a>

                    </div>
                    <span>Chúng tôi đi khắp thế giới để tìm kiếm cà phê tuyệt vời. Trong quá trình đó, chúng tôi phát hiện ra những hạt đậu đặc biệt và hiếm đến nỗi chúng tôi có thể chờ đợi để mang chúng về.</span>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                <div class="module_right a-center">
                    <img class="lazyload loaded" src="<?= base_url("assets/images/bg_about.png") ?>" data-src="<?= base_url("assets/images/bg_about.png") ?>" alt="Coffee House" data-was-processed="true">
                </div>
            </div>
        </div>
    </div>
</div>

<div id="hinhanh" class="st section_gallery">
    <div class="container">
        <div class="row">
            <div class="heading">
                <h2>Hình ảnh quán cafe</h2>
            </div>
            <div class="gallery_content">
                <div class="blog-list blog-image-list">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="al-item">
                            <img class="lazyload fancybox" src="<?= base_url("assets/userfiles/images/quan/z2580598016654_e25ba333f1545c69d861f70085f8eb79.jpg") ?>" data-src="<?= base_url("assets/userfiles/images/quan/z2580598016654_e25ba333f1545c69d861f70085f8eb79.jpg") ?>" alt="Coffee House" data-was-processed="true">
                            <a href="<?= base_url("assets/userfiles/images/quan/z2580598016654_e25ba333f1545c69d861f70085f8eb79.jpg") ?>" class="fancybox">
                                <i class="fa fa-search-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 content_right">
                        <div class="row">


                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 margin-bottom-30 item">
                                <div class="al-item al-item-min">
                                    <img class="lazyload" src="<?= base_url("assets/userfiles/images/quan/z2580597991134_0ab28371813d66a6b891756552112935.jpg") ?>" data-src="<?= base_url("assets/userfiles/images/quan/z2580597991134_0ab28371813d66a6b891756552112935.jpg") ?>" alt="Coffee House" data-was-processed="true">
                                    <a href="<?= base_url("assets/userfiles/images/quan/z2580597991134_0ab28371813d66a6b891756552112935.jpg") ?>" class="fancybox">
                                        <i class="fa fa-search-plus"></i>
                                    </a>
                                </div>
                            </div>


                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 margin-bottom-30 item">
                                <div class="al-item al-item-min">
                                    <img class="lazyload" src="<?= base_url("assets/userfiles/images/quan/z2580597987276_94aa8c6d6be8da235dbc0289a18670c5.jpg") ?>" data-src="<?= base_url("assets/userfiles/images/quan/z2580597987276_94aa8c6d6be8da235dbc0289a18670c5.jpg") ?>" alt="Coffee House" data-was-processed="true">
                                    <a href="<?= base_url("assets/userfiles/images/quan/z2580597987276_94aa8c6d6be8da235dbc0289a18670c5.jpg") ?>" class="fancybox">
                                        <i class="fa fa-search-plus"></i>
                                    </a>
                                </div>
                            </div>


                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 margin-bottom-30 item">
                                <div class="al-item al-item-min">
                                    <img class="lazyload" src="<?= base_url("assets/userfiles/images/quan/z2580598020115_cf802644b566ff98a0c5733f2758e36b.jpg") ?>" data-src="<?= base_url("assets/userfiles/images/quan/z2580598020115_cf802644b566ff98a0c5733f2758e36b.jpg") ?>" alt="Coffee House" data-was-processed="true">
                                    <a href="<?= base_url("assets/userfiles/images/quan/z2580598020115_cf802644b566ff98a0c5733f2758e36b.jpg") ?>" class="fancybox">
                                        <i class="fa fa-search-plus"></i>
                                    </a>
                                </div>
                            </div>


                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 margin-bottom-30 item">
                                <div class="al-item al-item-min">
                                    <img class="lazyload" src="<?= base_url("assets/userfiles/images/quan/z2580597987419_24f3227c25de3be5d2ba9419442ef11f.jpg") ?>" data-src="<?= base_url("assets/userfiles/images/quan/z2580597987419_24f3227c25de3be5d2ba9419442ef11f.jpg") ?>" alt="Coffee House" data-was-processed="true">
                                    <a href="<?= base_url("assets/userfiles/images/quan/z2580597987419_24f3227c25de3be5d2ba9419442ef11f.jpg") ?>" class="fancybox">
                                        <i class="fa fa-search-plus"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-8 col-md-offset-2 col-xs-12 a-center">
                        <iframe width="100%" height="412" src="https://www.youtube.com/embed/CsioskQDXxo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 a-center">
                        <a href="<?= base_url("thu-vien") ?>" title="Xem thêm" class="view_more_cls">Xem thêm <i class="fas fa-caret-right"></i></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?= view_cell("\App\Libraries\HomeWidget::menu") ?>

<?= view_cell("\App\Libraries\HomeWidget::news") ?>
<?= $this->endSection() ?>



<?= $this->section("script") ?>

<?= $this->endSection() ?>