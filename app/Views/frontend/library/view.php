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
                            <span class="mr_lr"><a href="<?= base_url("thu-vien") ?>"><span>Thư viện</span></a>
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
                        <?php if (pathinfo($row->file_url, PATHINFO_EXTENSION) == "mp4") : ?>
                            <a class="fancybox box-image" href="<?= $row->file_url ?>" data-fancybox="group2">
                                <video controls style="max-height:250px;" >
                                    <source src="<?= $row->file_url ?>" type="video/mp4">
                                    Your browser does not support HTML video.
                                </video>
                            </a>
                        <?php else : ?>
                            <a class="fancybox box-image" href="<?= $row->file_url ?>" data-fancybox="group2">
                                <img src="<?= $row->file_url ?>" style="max-height:250px;" />
                            </a>
                        <?php endif ?>
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