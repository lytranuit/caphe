<div class="home-banner-slides">
    <div class="container">
        <div class="c-home-app">
            <?php foreach ($pages as $row) : ?>
                <div>
                    <div class="single-app-banner">
                        <div class="single-app-banner__screen">
                            <div class="app-content-image app-content-image--sc">
                                <img src="<?= isset($row->image->src) ? $row->image->src : "assets/images/placeholder.png" ?>" alt="<?= $row->title_vi ?>">
                            </div>
                        </div>
                        <div class="single-app-banner__content">
                            <h2 class="app-content-title">
                                <?= $row->title_vi ?>
                            </h2>
                            <div class="app-content-sub">
                                <?= $row->description_vi ?>
                            </div>
                            <div class="app-content-action">
                                <a href="<?= base_url("page/view/" . $row->id) ?>" class="btn btn-lg btn-primary" tabindex="-1">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>