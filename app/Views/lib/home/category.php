<div class="a360-ld-st a360-ld-st--fields a360-ld-st--bg-grey">
    <div class="container">
        <div class="a360-ld-st__wrap">
            <div class="a360-ld-st__top">
                <h2 class="a360-ld-st__title">Danh mục <br class="on-mobile">sản phẩm</h2>
            </div>
            <div class="a360-ld-st__mid">
                <div class="ld-list-fields">
                    <?php foreach ($category as $row) : ?>
                        <div class="single-field">
                            <div class="single-field__image"><img src="<?= base_url(isset($row->image->src) ? $row->image->src : "assets/images/placeholder.png") ?>" alt="<?= $row->{pick_language($row, "name_")} ?>"></div>
                            <h3 class="single-field__text"><span><?= $row->{pick_language($row)} ?></span></h3>
                        </div>
                    <?php endforeach ?>

                </div>
            </div>
        </div>
    </div>
</div>