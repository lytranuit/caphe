<?php foreach ($news as $row) : ?>
    <div class="social-post-card ht-card item-post">
        <div class="card-header">
            <a href="<?= base_url("profile/view/$row->user_id") ?>">
                <div class="user-avatar "><img src="<?= base_url(isset($row->user->image->src) ? $row->user->image->src : "assets/images/placeholder.png") ?>" alt=""></div>
                <h4 class="user-title "><?= $row->user->name ?></h4>
            </a>
            <div class="post-meta"><?= date("Y-m-d H:i", strtotime($row->date)) ?></div>
        </div>
        <div class="card-content">
            <div class="news-header">
                <h3 class="news-title">
                    <a href="<?= url_news($row->id) ?>"><?= $row->{pick_language($row, 'title_')} ?></a>
                </h3>
            </div>
            <div class="post-content mb-2">
                <div class="text-wrapper">
                    <?= split_string($row->{pick_language($row, 'content_')}, 200) ?>
                </div>
                <div><a href="<?= url_news($row->id) ?>" class="read-more">Xem thêm</a></div>
            </div>

            <?php if (isset($row->image->src)) : ?>
                <div class="c-product-detail pt-0 pb-0">
                    <div class="c-product-detail__images">
                        <div class="c-image-list-h">
                            <div class="single-image" style="width: 110px;">
                                <a href="<?= base_url(isset($row->image->src) ? $row->image->src : "assets/images/placeholder.png") ?>" data-fancybox="product-log-gallery-83" tabindex="0">
                                    <span class="h-rectangle">
                                        <span class="h-rectangle__inner h-bg-cover" style="background-image: url(<?= base_url(isset($row->image->src) ? $row->image->src : "assets/images/placeholder.png") ?>);"></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
<?php endforeach ?>