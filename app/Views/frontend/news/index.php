<?= $this->extend('frontend/layouts/main') ?>


<?= $this->section('content') ?>

<div class="breadcrumb-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?= base_url() ?>">Trang chủ</a></li>
            <li class="active">Tin tức</li>
            <?php if (isset($tag)) : ?>
                <li class="active"><?= $tag->{pick_language($tag, "name_")} ?></li>
            <?php endif ?>
        </ol>
    </div>
</div>
<div class="container">
    <div class="c-categorybar">
        <div class="c-categorybar__top">
            <a href="#" id="Toggle__Search" class="c-categorybar__toggle" data-toggle="collapse">
                <i class="fas fa-search toggle-icon"></i>
            </a>
            <div class="toggle-search">
                <input type="text" id="input-search-product" class="search-input" placeholder="Tìm kiếm">
            </div>
            <div class="toggle-label hidden">Danh mục sản phẩm</div>
            <a href="#Collapse__ProductCategory" class="c-categorybar__toggle collapsed" data-toggle="collapse">
                <i class="fas fa-bars toggle-icon"></i>
            </a>
        </div>

        <div id="Collapse__ProductCategory" class="collapse">
            <div>
                <div class="panel-group panel-group--cats" id="Accordion__ProductCats" role="tablist">
                    <div class="panel panel-default">
                        <?php foreach ($tags as $row) : ?>
                            <div class="panel-heading" role="tab">
                                <div class="panel-title">
                                    <a href="<?= url_news_list($row->id) ?>" class="cat-link__label <?= isset($tag) && $row->id == $tag->id ? 'disabled' : '' ?>">
                                        <?= $row->{pick_language($row, "name_")} ?>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="c-list-products">
        <div class="row" id="list-products">

        </div>
    </div>
    <div class="c-more-products" id="button-load-more">
        <div class="text-center"><a href="javascript:;void(0)" class="btn-see-more btn">Xem thêm</a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section("script") ?>
<script>
    var tag_id = <?= $tag_id ?>;
    var offset = 0;
    var limit = 20;
    $(document).ready(function() {
        getmore();

        $(".c-categorybar__toggle").click(function() {
            offset = 0;
            $("#list-products").empty();
            getmore();
        });
        $(".btn-see-more").click(function() {
            getmore();
        });
        $('#input-search-product').keypress(function(e) {
            if (e.which == 13) {
                $(".c-categorybar__toggle").trigger("click");
                return false; //<---- Add this line
            }
        });
    })

    function getmore() {
        let keyword = $("#input-search-product").val();
        $.ajax({
            url: path + "ajax/news",
            data: {
                tag_id: tag_id,
                limit: limit,
                offset: offset,
                keyword: keyword
            },
            success: function(data) {
                $("#list-products").append(data);
                //var data_parse = $.parseHTML("<div>" + data + "</div>");
                //let count = $(".item-product", data_parse).length;
                offset += limit;
            }
        })
    }
</script>
<?= $this->endSection() ?>