<!-- 5 -->
<div class="home-section-wrapper">
    <div class="container">
        <div class="home-section home-section--featured-users">
            <div class="home-section__header">
                <h2 class="home-section__title">Thành viên tiêu biểu</h2>
            </div>
            <div class="home-section__content">

                <div class="c-slider--account">
                    <?php foreach ($users as $row) : ?>
                        <div class='c-slider__col'>
                            <div class="single-user single-card c-slider__item">
                                <a href="<?= base_url("profile/view/$row->id") ?>" class="single-user__link h-link-block" tabindex="0">
                                    <div class="single-user__avatar h-rectangle h-rectangle">
                                        <div class="image-wrap h-rectangle__inner h-bg-cover" style="background-image: url(<?= base_url(isset($row->image->src) ? $row->image->src : "assets/images/placeholder.png") ?>);"></div>
                                    </div>
                                    <div class="single-user__content">
                                        <h4 class="single-user__title"><?= $row->name ?></h4>
                                        <div class="single-user__subtitle"><?= $row->description ?></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>