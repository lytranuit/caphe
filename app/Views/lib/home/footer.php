<footer class="site-footer">
    <div class="site-footer__main h-bg-cover" style="background-image: url(<?= base_url("assets/images/footer.jpeg") ?>);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-content">
                        <div class="footer-content__single">
                            <?= $options['company_name'] ?>

                            <?= $options['mo_ta'] ?>

                            ĐC: <?= $options['dia_chi'] ?>

                            Liên hệ : <?= $options['hot_line'] ?>

                            Email: <?= $options['email'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="hotline-phone-ring-wrap">
    <div class="hotline-phone-ring">
        <div class="hotline-phone-ring-circle"></div>
        <div class="hotline-phone-ring-circle-fill"></div>
        <div class="hotline-phone-ring-img-circle">
            <a href="tel:0353928135" class="pps-btn-img">
                <img src="<?= base_url("assets/images/icon-2.png") ?>" alt="Số điện thoại" width="50">
            </a>
        </div>
    </div>
    <div class="hotline-bar">
        <a href="tel:0353928135">
            <span class="text-hotline">035.392.8135</span>
        </a>
    </div>
</div>