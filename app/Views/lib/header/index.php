<div class="opacity_menu"></div>
<div id="mySidenav" class="sidenav menu_mobile">
    <div class="top_menu_mobile hidden-lg hidden-md">
        <a href="/" class="logo-wrapper ">
            <img src="<?= base_url("assets/images/logo/logo.png") ?>" alt="logo Huy tùng Coffee" width="90">
        </a>
    </div>
    <div class="content_memu_mb hidden-lg hidden-md">
        <div class="link_list_mobile">
            <ul class="ct-mobile">
                <li class="level0 level-top parent level_ico">
                    <a class="a_level0" href="/">Trang chủ</a>

                </li>
                <li class="level0 level-top parent level_ico">
                    <a class="a_level0" href="/gioi-thieu">Giới thiệu</a>
                </li>
                <li class="level0 level-top parent level_ico">
                    <a class="a_level0" href="#">Sản phẩm</a>
                    <i class="ti-plus hide_close i_level0">
                    </i>
                    <ul class="sub-menu" style="display:none;">
                        <?php foreach ($categories as $row) : ?>
                            <li class="level1">
                                <a href="<?= url_product_list($row->id) ?>"><span><?= $row->{pick_language($row, "name_")} ?></span></a>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </li>
                <li class="level0 level-top parent level_ico">
                    <a class="a_level0" href="/thu-vien">Thư viện</a>
                </li>
                <li class="level0 level-top parent level_ico">
                    <a class="a_level0" href="<?= url_news_list(0) ?>">Tin tức</a>

                </li>

                <li class="level0 level-top parent level_ico">
                    <a class="a_level0" href="/lien-he">Liên hệ</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<header class="header header_other">
    <div class="topbar hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-5 hidden-xs">
                    <div class="topbar_left">
                        <ul>
                            <li>
                                <span class="welcome_text">Chào mừng bạn đến với Huy Tùng Coffee!</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-7 d-list col-xs-12 a-right topbar_right hidden-xs">
                    <div class="list-inline f-right">
                        <div class="hotline-bar" wfd-id="5">
                            <a href="tel:0913445558">
                                <span class="text-hotline">Hot line: 0913.445.558</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mid-header wid_100">
        <div class="container">
            <div class="row">
                <div class="content_header">
                    <div class="header-main">
                        <div class="wrap_main">
                            <div class="container">
                                <div class="row row-noGutter">
                                    <nav class="header-nav">
                                        <ul class="item_big nav-left hidden-xs hidden-sm">
                                            <li class="nav-item ">
                                                <a class="a-img" href="/">
                                                    <span>Trang chủ</span>
                                                </a>
                                            </li>
                                            <li class="nav-item ">
                                                <a class="a-img" href="/gioi-thieu">
                                                    <span>Giới thiệu</span>
                                                </a>
                                            </li>
                                            <li class="nav-item ">
                                                <a class="a-img" href="#">
                                                    <span>Sản phẩm</span><i class="fa fa-caret-down"></i>
                                                </a>
                                                <ul class="item_small hidden-sm hidden-xs">
                                                    <?php foreach ($categories as $row) : ?>
                                                        <li class="level1">
                                                            <a href="<?= url_product_list($row->id) ?>"><span><?= $row->{pick_language($row, "name_")} ?></span></a>
                                                        </li>
                                                    <?php endforeach ?>


                                                </ul>
                                            </li>
                                        </ul>
                                        <ul class="logo_center">
                                            <li class="logo">
                                                <a href="/" class="logo-wrapper ">
                                                    <img src="<?= base_url("assets/images/logo/logo.png") ?>" alt="logo Huy tùng Coffee">
                                                </a>

                                            </li>
                                        </ul>
                                        <ul class="item_big nav-right hidden-xs hidden-sm">
                                            <li class="nav-item ">
                                                <a class="a-img" href="/thu-vien">
                                                    <span>Thư viện</span>
                                                </a>
                                            </li>

                                            <li class="nav-item ">
                                                <a class="a-img" href="<?= url_news_list(0) ?>">
                                                    <span>Tin tức</span>
                                                </a>
                                            </li>




                                            <li class="nav-item ">
                                                <a class="a-img" href="/lien-he">
                                                    <span>Liên hệ</span>
                                                </a>
                                            </li>


                                        </ul>
                                        <div class="cartgroup">
                                            <div class="searchion inline-b">
                                                <span class=" nn"><i class="fas fa-search"></i></span>
                                                <div class="searchmini">
                                                    <form action="/product/search" method="get" class="input-group search-bar" role="search">
                                                        <input type="text" name="s" value="" autocomplete="off" placeholder="Tìm kiếm..." class="button_gradient input-group-field auto-search ">
                                                        <button type="submit" class=" btn icon-fallback-text">
                                                            <span class="fas fa-search"></span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <span class="xo">|</span>
                                            <div class="header-right inline-block">
                                                <div class="top-cart-contain f-right">
                                                    <div class="mini-cart text-xs-center">
                                                        <div class="heading-cart cart_header">
                                                            <a class="img_hover_cart" href="/cart" title="Giỏ hàng">
                                                                <div class="icon_hotline ">
                                                                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                                    <span class="count_item count_item_pr button_gradient">4</span>
                                                                </div>
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="top-cart-contain f-right hidden">
                                                    <div class="mini-cart text-xs-center">
                                                        <div class="heading-cart">
                                                            <a class="bg_cart" href="/cart" title="Giỏ hàng">
                                                                <i class="ion-android-cart"></i>
                                                                <span class="count_item count_item_pr">4</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="menu_search_mobi hidden-md hidden-lg">
        <div class="menu-bar-h nav-mobile-button hidden-md hidden-lg">
            <i class="fas fa-bars"></i>
        </div>

        <div class="searchboxlager hidden-lg">
            <div class="searchfromtop">
                <form action="/product/search" method="get" autocomplete="off">
                    <input type="search" name="s" value="" placeholder="Tìm kiếm tin tức..." class=" hidden-md st-default-search-input search-text" autocomplete="off">
                    <input type="hidden" class="form-control" name="type" value="article">
                </form>
            </div>
        </div>
    </div>
</header>