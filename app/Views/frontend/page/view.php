<?= $this->extend('frontend/layouts/main') ?>


<?= $this->section('content') ?>

<div class="breadcrumb-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?= base_url() ?>">Trang chủ</a></li>

            <li class="active"><?= $info->{pick_language($info, "title_")} ?></li>
        </ol>
    </div>
</div>
<div class="c-single-post c-single-post--news">
    <div class="container">
        <div class="single-news-post">
            <div class="row">
                <div class="col-xs-10">
                    <h1 class="post-title"><?= $info->{pick_language($info, "title_")} ?></h1>
                </div>
                <div class="col-xs-2">
                    <div class="button-share">
                        <div id="fb-share-button" class="pull-right">
                            <i class="fa fa-share" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>


            <div class="post-meta"><?= date("Y-m-d H:i:s", strtotime($info->date)) ?></div>



            <div class="post-content">
                <?= $info->{pick_language($info, "content_")} ?>
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
        //$('.content--slide-images-2').slick({
        //    slidesToShow: 4,
        //    slidesToScroll: 1,
        //    arrows: true,
        //    prevArrow: '<span class="c-slider__arrow c-slider__arrow--prev"><i class="fas fa-chevron-left"></i></span>',
        //    nextArrow: '<span class="c-slider__arrow c-slider__arrow--next"><i class="fas fa-chevron-right"></i></span>',
        //    responsive: [{
        //            breakpoint: 1024,
        //            settings: {
        //                slidesToShow: 4,
        //            }
        //        },
        //        {
        //            breakpoint: 768,
        //            settings: {
        //                slidesToShow: 3,
        //            }
        //        },
        //        {
        //            breakpoint: 480,
        //            settings: {
        //                slidesToShow: 2,
        //            }
        //        }
        //    ],
        //});
        //// slide: home products
        //$('.c-slider--products--related').slick({
        //    slidesToShow: 5,
        //    slidesToScroll: 1,
        //    arrows: true,
        //    prevArrow: '<span class="c-slider__arrow c-slider__arrow--prev"><i class="fas fa-chevron-left"></i></span>',
        //    nextArrow: '<span class="c-slider__arrow c-slider__arrow--next"><i class="fas fa-chevron-right"></i></span>',
        //    responsive: [{
        //            breakpoint: 1024,
        //            settings: {
        //                slidesToShow: 4,
        //            }
        //        },
        //        {
        //            breakpoint: 768,
        //            settings: {
        //                slidesToShow: 3,
        //            }
        //        },
        //        {
        //            breakpoint: 480,
        //            settings: {
        //                slidesToShow: 2,
        //            }
        //        }
        //    ],
        //});
    })
</script>
<?= $this->endSection() ?>