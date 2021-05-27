<div class="home-banner-wrapper">
    <div class="container">
        <div class="home-banner">
            <div class="c-slider">
                <?php foreach ($sliders as $row) : ?>
                    <div class="single-banner">
                        <a href="<?= $row->url ?>" class="single-banner__link" tabindex="-1">
                            <img src="<?= isset($row->image->src) ? $row->image->src : "assets/images/placeholder.png" ?>" alt="">
                        </a>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>