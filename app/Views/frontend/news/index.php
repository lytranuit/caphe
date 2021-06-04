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
                        <li><strong><span>Tin tức</span></strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="container" wfd-id="78">
    <div class="wrap_list_vertical margin-top-50 margin-bottom-50" wfd-id="80">
        <div class="row" wfd-id="81">
            <?php foreach ($news as $row) : ?>
                <div class="content-blog-index blog_left col-lg-6 col-md-6 col-sm-6 col-xs-12" wfd-id="82">
                    <div class="blog_index" wfd-id="83">
                        <div class="myblog" wfd-id="84">
                            <div class="image-blog-left a-center" wfd-id="89">

                                <a class="img_bot" href="<?= url_news($row->id) ?>">
                                    <img class="lazyload loaded" src="<?= base_url(isset($row->image->src) ? $row->image->src : "assets/images/placeholder.png") ?>" data-src="<?= base_url(isset($row->image->src) ? $row->image->src : "assets/images/placeholder.png") ?>" title="<?= $row->{pick_language($row, "title_")} ?>" alt="<?= $row->{pick_language($row, "title_")} ?>" data-was-processed="true">
                                </a>

                            </div>
                            <div class="content_blog" wfd-id="85">
                                <div class="content_right" wfd-id="87">
                                    <span class="short_time" wfd-id="88">
                                        <i class="fas fa-calendar-alt"></i> <?= date("Y-m-d", strtotime($row->date)) ?>
                                    </span>
                                    <h3>
                                        <a href="<?= url_news($row->id) ?>" title="<?= $row->{pick_language($row, "title_")} ?>"><?= $row->{pick_language($row, "title_")} ?></a>
                                    </h3>
                                </div>
                                <div class="summary_item_blog" wfd-id="86">
                                    <p><?= split_string($row->{pick_language($row, 'content_')}, 100) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>

    <div class="text-center paginate_center col-lg-12 col-sm-12 col-xs-12 col-md-12" wfd-id="79">
        <?php if ($pager) : ?>
            <?php $pagi_path = 'index.php/users'; ?>
            <?php $pager->setPath($pagi_path); ?>
            <?= $pager->links() ?>
        <?php endif ?>
    </div>

</div>
<?= $this->endSection() ?>

<?= $this->section("script") ?>
<?= $this->endSection() ?>