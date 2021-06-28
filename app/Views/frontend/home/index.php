<?= $this->extend('frontend/layouts/main') ?>


<?= $this->section('content') ?>

<div class="section_slider">
    <div class="home-slider section_slider swiper-container">
        <div class="swiper-wrapper" id="swiper-wrapper-1375be3df72c34ff">
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


<?= view_cell("\App\Libraries\HomeWidget::feedback") ?>

<?= view_cell("\App\Libraries\HomeWidget::news") ?>
<?= $this->endSection() ?>



<?= $this->section("script") ?>
<?= $this->endSection() ?>