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
                        <li><strong><span><?= $info->{pick_language($info, "title_")} ?></span></strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>

<section>
    <div class="container">
        <div class="row">
            <?php if (!empty($info->files)) : ?>
                <?php foreach ($info->files as $row) : ?>
                    <div class="col-lg-3 col-md-4 col-xs-6 m-2">
                        <a class="fancybox box-image" href="<?= $row->file_url ?>" data-fancybox="group2">
                            <img src="<?= $row->file_url ?>" />
                        </a>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>


<?= $this->section("style") ?>

<?= $this->endSection() ?>

<?= $this->section("script") ?>

<?= $this->endSection() ?>