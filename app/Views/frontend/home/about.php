<?= $this->extend('frontend/layouts/main') ?>


<?= $this->section('content') ?>
<div class="breadcrumb_nobackground margin-bottom-40">
    <section class="bread-crumb">
        <span class="crumb-border"></span>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 a-left">
                    <ul class="breadcrumb">
                        <li class="home">
                            <a href="<?= base_url() ?>"><span>Trang chủ</span></a>
                            <span class="mr_lr"><i class="fas fa-circle"></i></span>
                        </li>
                        <li><strong><span>Giới thiệu</span></strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>
<section class="margin-top-5 f-left w_100">
    <div class="container" wfd-id="75">
        <div class="row" wfd-id="76">
            <div class="col-xs-12 col-sm-12 col-md-12" wfd-id="77">
                <div class="page-title category-title" wfd-id="88">
                    <h1 class="title-head"><a href="#">Giới thiệu</a></h1>
                </div>
                <div class="content-page rte" wfd-id="78">
                    <p>Trang giới thiệu giúp khách hàng hiểu rõ hơn về cửa hàng của bạn. Hãy cung cấp thông tin cụ thể về việc kinh doanh, về cửa hàng, thông tin liên hệ. Điều này sẽ giúp khách hàng cảm thấy tin tưởng khi mua hàng trên website của bạn.</p>
                    <p>Một vài gợi ý cho nội dung trang Giới thiệu:</p>
                    <ul wfd-id="79">
                        <li wfd-id="87">Bạn là ai</li>
                        <li wfd-id="86">Giá trị kinh doanh của bạn là gì</li>
                        <li wfd-id="85">Địa chỉ cửa hàng</li>
                        <li wfd-id="84">Bạn đã kinh doanh trong ngành hàng này bao lâu rồi</li>
                        <li wfd-id="83">Bạn kinh doanh ngành hàng online được bao lâu</li>
                        <li wfd-id="82">Đội ngũ của bạn gồm những ai</li>
                        <li wfd-id="81">Thông tin liên hệ</li>
                        <li wfd-id="80">Liên kết đến các trang mạng xã hội (Twitter, Facebook)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</section>
<?= $this->endSection() ?>



<?= $this->section("script") ?>
<?= $this->endSection() ?>