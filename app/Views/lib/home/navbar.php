<ul class="list-header-nav list-header-nav--6items">

    <?php foreach ($menus as $row) : ?>
        <li>
            <?php if ($row->type == 1) : ?>
                <a href="<?= $row->link ?>"><?= $row->{pick_language($row, 'name_')} ?></a>
            <?php elseif ($row->type == 2) : ?>
                <a href="<?= url_product_list($row->category_id) ?>"><?= $row->{pick_language($row, 'name_')} ?></a>
            <?php elseif ($row->type == 3) : ?>

                <a href="<?= url_news_list($row->category_id) ?>"><?= $row->{pick_language($row, 'name_')} ?></a>
            <?php elseif ($row->type == 4) : ?>
                <?php if ($row->category_id == 0) : ?>
                    <a href="<?= url_page_list($row->category_id) ?>"><?= $row->{pick_language($row, 'name_')} ?></a>
                <?php else : ?>
                    <a href="<?= url_page($row->category_id) ?>"><?= $row->{pick_language($row, 'name_')} ?></a>
                <?php endif ?>
            <?php endif ?>
        </li>
    <?php endforeach ?>

</ul>