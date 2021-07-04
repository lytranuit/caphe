<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div><img src="<?= base_url() ?>public/img/logo.png" width="150" /></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading"><?= lang("Custom.dashboard") ?></li>
                <li>
                    <a href="<?= base_url("admin") ?>">
                        <i class="metismenu-icon"></i>
                        <?= lang("Custom.dashboard") ?>
                    </a>
                </li>
                <li class="app-sidebar__heading">Thư viện</li>
                <li>
                    <a href="<?= base_url("admin/library") ?>">
                        <i class="metismenu-icon"></i>
                        Thư viện
                    </a>
                </li>
                <li class="app-sidebar__heading"><?= lang("Custom.news") ?></li>
                <li>
                    <a href="<?= base_url("admin/news") ?>">
                        <i class="metismenu-icon"></i>
                        <?= lang("Custom.news") ?>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url("admin/tag") ?>">
                        <i class="metismenu-icon"></i>
                        <?= lang("Custom.news_category") ?>
                    </a>
                </li>
                <li class="app-sidebar__heading"><?= lang("Custom.product") ?></li>
                <li>
                    <a href="<?= base_url("admin/product") ?>">
                        <i class="metismenu-icon"></i>
                        <?= lang("Custom.product") ?>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url("admin/category") ?>">
                        <i class="metismenu-icon"></i>
                        <?= lang("Custom.product_category") ?>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url("admin/category_menu") ?>">
                        <i class="metismenu-icon"></i>
                        <?= lang("Custom.product_menu") ?>
                    </a>
                </li>
                <li class="app-sidebar__heading"><?= lang("Custom.sales") ?></li>
                <li>
                    <a href="<?= base_url("admin/sale") ?>">
                        <i class="metismenu-icon"></i>
                        <?= lang("Custom.sales") ?>
                    </a>
                </li>
                <li class="app-sidebar__heading"><?= lang("Custom.setting") ?></li>
                <!-- <li>
                    <a href="<?= base_url("admin/settings") ?>">
                        <i class="metismenu-icon"></i>
                        <?= lang("Custom.general") ?>
                    </a>
                </li> -->

                <li>
                    <a href="<?= base_url("admin/page") ?>">
                        <i class="metismenu-icon"></i>
                        <?= lang("Custom.page") ?>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url("admin/user") ?>">
                        <i class="metismenu-icon"></i>
                        <?= lang("Custom.account") ?>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url("admin/feedback") ?>">
                        <i class="metismenu-icon"></i>
                        <?= lang("Custom.feedback") ?>
                    </a>
                </li>
                <!-- <li>
                    <a href="<?= base_url("admin/language") ?>">
                        <i class="metismenu-icon fas fa-columns"></i>
                        <?= lang("Custom.language") ?>
                    </a>
                </li> -->
            </ul>
        </div>
    </div>
</div>