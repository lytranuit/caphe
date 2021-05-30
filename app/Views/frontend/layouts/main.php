<!DOCTYPE html>
<!-- saved from url=(0020)https://hoptacxa.vn/ -->
<html lang="vi">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="gao phu yen, nha may xay xat, lua gao phu yen, gao xay moc, gao dac san,gao lam bun, gao lam banh trang,gao cac loai">
    <meta property="og:url" content="<?= base_url() ?>">
    <meta property="og:title" content="Tú Loan | Nhà máy xay xat lúa gạo Phú Yên">
    <meta property="og:type" content="article">
    <meta property="og:description" content="">
    <meta property="og:image" content="<?= base_url("assets/images/logo.png?v=1") ?>">

    <meta name="robots" content="index,follow" />
    <link rel="canonical" href="<?= base_url() ?>">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url("assets/images/logo.png") ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="author" content="daotran">
    <meta name="copyright" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="preload" as="style" type="text/css" href="<?= base_url("assets/css") ?>/plugin.scss.css">
    <link rel="preload" as="style" type="text/css" href="<?= base_url("assets/css") ?>/base.scss.css">
    <link rel="preload" as="style" type="text/css" href="<?= base_url("assets/css") ?>/style.scss.css">
    <link rel="preload" as="style" type="text/css" href="<?= base_url("assets/css") ?>/module.scss.css">
    <link rel="preload" as="style" type="text/css" href="<?= base_url("assets/css") ?>/responsive.scss.css">
    <link href="<?= base_url("assets/css") ?>/plugin.scss.css" rel="stylesheet" type="text/css">
    <!-- Build Main CSS -->
    <link href="<?= base_url("assets/css") ?>/base.scss.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url("assets/css") ?>/style.scss.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url("assets/css") ?>/module.scss.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url("assets/css") ?>/responsive.scss.css" rel="stylesheet" type="text/css">

    <style type="text/css">
        .swiper-container {
            margin: 0 auto;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
    </style>
    <script src="<?= base_url("assets/js/jquery.min.js") ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.3.1/dist/lazyload.min.js"></script>
    <script src="<?= base_url("assets/js/caphe.js") ?>"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- CSS -->
    <?= $this->renderSection('style') ?>

    <script>
        var path = '<?= base_url() ?>/';
    </script>

    <title><?= $title ?></title>
</head>

<body>
    <div class="site-wrapper">

        <?= $this->include('frontend/layouts/_header') ?>

        <?= $this->renderSection("content"); ?>

        <!-- Site Header -->
        <?= $this->include('frontend/layouts/_footer') ?>


        <?= $this->renderSection('script') ?>
    </div>
</body>

</html>