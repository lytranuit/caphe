<?= $this->extend('frontend/layouts/main') ?>


<?= $this->section('content') ?>

<div class="container">
    <div class="s-profile h-mt-2 h-mb-4">
        <div class="profile-wrapper profile-wrapper--pd profile-wrapper--bd">
            <div class="profile-header">
                <div class="profile-header__left">
                    <div class="profile-header__avatar h-bg-cover" style="background-image: url(<?= base_url(isset($info->image->src) ? $info->image->src : "assets/images/placeholder.png") ?>);"></div>
                    <div class="profile-header__info">
                        <h1 class="profile-header__title"><?= $info->name ?></h1>
                        <div class="profile-header__subtitle"><i class="ion-ios-person"></i> <?= $info->description ?>
                        </div>
                        <div class="profile-header__action">
                        </div>
                    </div>
                </div>
                <div class="profile-header__right">
                </div>
            </div>
        </div>
        <div class="profile-content">
            <div class="profile-content__single-info">

                <div class="info-content">
                    <div class="info-content__label">Điện thoại liên hệ</div>
                    <div class="info-content__text"><a href="tel:<?= $info->phone ?>"><?= $info->phone ?></a></div>
                </div>
            </div>
            <div class="profile-content__single-info">

                <div class="info-content">
                    <div class="info-content__label">Địa chỉ</div>
                    <div class="info-content__text"><?= $info->address ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>



<?= $this->section("script") ?>
<?= $this->endSection() ?>