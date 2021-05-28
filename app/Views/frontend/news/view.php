<?= $this->extend('frontend/layouts/main') ?>


<?= $this->section('content') ?>

<div class="breadcrumb_nobackground margin-bottom-0">
    <section class="bread-crumb">
        <span class="crumb-border"></span>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 a-left">
                    <ul class="breadcrumb">
                        <li><a href="<?= base_url() ?>">Trang chủ</a><span class="mr_lr"><i class="fas fa-circle"></i></span></li>
                        <li><a href="<?= url_news_list(0); ?>">Tin tức</a><span class="mr_lr"><i class="fas fa-circle"></i></span></li>
                        <li class="active"><strong><span><?= $info->{pick_language($info, "title_")} ?></span></strong></li>

                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="container">
    <div class="row">
        <section class="right-content col-md-12 col-sm-12 col-xs-12">
            <article class="article-main content_all">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="article-details">
                            <div class="date"><i class="fas fa-clock"></i>
                                <div class="news_home_content_short_time">
                                    <?= date("Y-m-d H:i:s", strtotime($info->date)) ?>
                                </div>
                            </div>
                            <h1 class="article-title"><span><?= $info->{pick_language($info, "title_")} ?></span></h1>

                            <!-- END TIN TỨC KHÁC -->
                            <div class="article-content">
                                <div class="rte">
                                    <?= $info->{pick_language($info, "content_")} ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- BÌNH LUẬN TIN TỨC -->

                    <!-- END BÌNH LUẬN TIN TỨC -->
                    <!-- TIN TỨC KHÁC -->

                    <div class="col-xs-12">
                        <div class="block-recent">
                            <h2 class="title-form-coment title_blog">
                                <a href="tin-tuc" title="Các tin khác">Các tin khác</a>
                            </h2>
                            <ul class="padding-0">
                                <?php foreach ($news as $row) : ?>
                                    <li>
                                    
                                        <a href="<?= url_news($row->id) ?>" title="<?= $row->{pick_language($row, 'title_')} ?>"><i class="fas fa-caret-right"></i> <?= $row->{pick_language($row, 'title_')} ?></a>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>

                    <!-- END TIN TỨC KHÁC -->
                </div>
            </article>
        </section>
    </div>
</div>
<?= $this->endSection() ?>



<?= $this->section("style") ?>

<link rel="stylesheet" href="<?= base_url("assets/lib/ckeditor/contents.css") ?> " ?>
<?= $this->endSection() ?>
<?= $this->section("script") ?>
<?= $this->endSection() ?>