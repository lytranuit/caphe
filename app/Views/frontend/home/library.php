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
                        <li><strong><span>Thư viện</span></strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>
<section class="margin-top-5 f-left w_100">
    <div class="container" wfd-id="75">
        <div class="row" wfd-id="76">
            <?php foreach ($libraries as $row) : ?>
                <div class="recent-box col-md-3 col-xs-6">

                    <div class="d-image">
                        <a href="<?= url_library($row->id) ?>" target="_top">
                            <img class="label_thumb text-center" src="<?= base_url(isset($row->image_url) ? $row->image_url : "assets/images/placeholder.png") ?>" title="<?= $row->title_vi ?>" alt="<?= $row->title_vi ?>">
                        </a>
                    </div>
                    <div class="details">
                        <h2><a class="label_title" href="<?= url_library($row->id) ?>" target="_top"><?= $row->title_vi ?></a></h2>

                    </div>
                </div>
            <?php endforeach ?>

        </div>
    </div>

</section>
<?= $this->endSection() ?>



<?= $this->section("script") ?>
<?= $this->endSection() ?>