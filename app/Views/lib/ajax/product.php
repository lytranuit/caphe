<?php foreach ($products as $row) : ?>
    <div class="col-xs-6 col-sm-4 col-md-3 item-product">
        <div class="c-card c-card--product">
            <a href="<?= url_product($row->id); ?>" class="single-product">
                <div class="single-product__image">
                    <div class="h-rectangle">
                        <div class="h-rectangle__inner">
                            <img src="<?= base_url(isset($row->image->src) ? $row->image->src : "assets/images/placeholder.png") ?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="single-product__content">
                    <div class="single-product__title"><?= $row->{pick_language($row, 'name_')} ?></div>
                    <div class="single-product__code"><?= $row->code ?></div>
                </div>
            </a>
        </div>
    </div>
<?php endforeach ?>