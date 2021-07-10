<!DOCTYPE html>
<!-- saved from url=(0020)https://hoptacxa.vn/ -->
<html lang="vi">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Với kinh nghiệm hơn 40 năm hoạt động trong lĩnh vực chế biến cà phê, Công ty TNHH Cà phê Huy Tùng đã cho ra đời nhiều dòng sản phẩm được khách hàng cả nước ưa chuộng">
    <meta name="keywords" content="Với kinh nghiệm hơn 40 năm hoạt động trong lĩnh vực chế biến cà phê, Công ty TNHH Cà phê Huy Tùng đã cho ra đời nhiều dòng sản phẩm được khách hàng cả nước ưa chuộng">
    <meta property="og:url" content="<?= base_url() ?>">
    <meta property="og:title" content="Huy tùng coffee">
    <meta property="og:type" content="article">
    <meta property="og:description" content="Với kinh nghiệm hơn 40 năm hoạt động trong lĩnh vực chế biến cà phê, Công ty TNHH Cà phê Huy Tùng đã cho ra đời nhiều dòng sản phẩm được khách hàng cả nước ưa chuộng">
    <meta property="og:image" content="<?= base_url("assets/images/logo/logo.png?v=1") ?>">

    <meta name="robots" content="index,follow" />
    <link rel="canonical" href="<?= base_url() ?>">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url("assets/images/logo/logo.png?v=1") ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="author" content="daotran">
    <meta name="copyright" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Build Main CSS -->
    <?php $ver = 2 ?>
    <link href="<?= base_url("assets/css/all.css?" .  $ver) ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url("assets/css/plugin.scss.css?" .  $ver) ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url("assets/css/base.scss.css?" .  $ver) ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url("assets/css/style.scss.css?" .  $ver) ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url("assets/css/module.scss.css?" .  $ver) ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url("assets/css/responsive.scss.css?" .  $ver) ?>" rel="stylesheet" type="text/css">


    <link href="<?= base_url("assets/lib/sweetalert/sweetalert.css") ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= base_url("assets/lib/fancybox/jquery.fancybox.css") ?>" />

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
    <script src="<?= base_url("assets/js/caphe.js?" .  $ver) ?>"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url("assets/lib/fancybox/jquery.fancybox.js") ?>"></script>
    <script src="<?= base_url("assets/lib/sweetalert/sweetalert.min.js") ?>"></script>
    <script src="<?= base_url("assets/lib/cookie/jquery.cookies.2.2.0.min.js") ?>"></script>
    <script src="<?= base_url("assets/js/cart.js") ?>"></script>
    <!-- CSS -->
    <?= $this->renderSection('style') ?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,500,600,700%7CDancing+Script:400,500,700%7COswald:400,500,600,700" media="all">
    <script>
        var path = '<?= base_url() ?>/';
        $(document).ready(function() {
            $(".fancybox").fancybox()
        })
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