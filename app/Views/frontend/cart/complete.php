<?= $this->extend('frontend/layouts/main') ?>


<?= $this->section('content') ?>
<div class="checkout-page-title page-title">
    <div class="page-title-inner flex-row medium-flex-wrap container">
        <div class="flex-col flex-grow medium-text-center">
           
            <nav class="breadcrumbs heading-font checkout-breadcrumbs text-center h2 strong">
                <a href="<?= base_url("cart") ?>" class="no-click hide-for-small ">Giỏ hàng</a>
                <span class="divider hide-for-small"><i class="icon-angle-right"></i></span>
                <a href="<?= base_url("cart/checkout") ?>" class="no-click hide-for-small">Thanh toán</a>
                <span class="divider hide-for-small"><i class="icon-angle-right"></i></span>
                <a href="#" class="no-click current">Hoàn tất</a>
            </nav>
        </div><!-- .flex-left -->
    </div><!-- flex-row -->
</div><!-- .page-title -->
<div class="cart-container container page-wrapper page-checkout">
    <div class="woocommerce">
        <div class="woocommerce-notices-wrapper"></div>
        <div name="checkout" method="post" class="checkout woocommerce-checkout ">

            <div class="row pt-0 ">
                <div class="large-7 col  ">


                    <div id="customer_details">
                        <div class="clear">
                            <div class="woocommerce-billing-fields">

                                <h3>Thông tin thanh toán</h3>
                                <div class="woocommerce-billing-fields__field-wrapper">
                                    <p class="form-row form-row-wide validate-required" id="billing_last_name_field" data-priority="10"><label for="billing_last_name" class="">Họ và tên&nbsp;<abbr class="required" title="bắt buộc">*</abbr></label><span class="woocommerce-input-wrapper"><?= $_POST['name'] ?></span></p>
                                    <p class="form-row form-row-last thwcfd-field-wrapper thwcfd-field-tel validate-required validate-phone" id="billing_phone_field" data-priority="20"><label for="billing_phone" class="">Số điện thoại&nbsp;<abbr class="required" title="bắt buộc">*</abbr></label><span class="woocommerce-input-wrapper"><?= $_POST['phone'] ?></span></p>
                                    <p class="form-row form-row-first thwcfd-field-wrapper thwcfd-field-email validate-required validate-email" id="billing_email_field" data-priority="21"><label for="billing_email" class="">Địa chỉ email&nbsp;<abbr class="required" title="bắt buộc">*</abbr></label><span class="woocommerce-input-wrapper"><?= $_POST['email'] ?></span></p>
                                    <p class="form-row form-row-wide validate-required" id="billing_address_1_field" data-priority="60"><label for="billing_address_1" class="">Địa chỉ&nbsp;<abbr class="required" title="bắt buộc">*</abbr></label><span class="woocommerce-input-wrapper"><?= $_POST['address'] ?></span></p>
                                </div>

                            </div>


                        </div>

                        <div class="clear">
                            <div class="woocommerce-additional-fields">
                                <div class="woocommerce-additional-fields__field-wrapper">
                                    <p class="form-row notes thwcfd-field-wrapper thwcfd-field-textarea" id="order_comments_field" data-priority=""><label for="order_comments" class="">Ghi chú đơn hàng&nbsp;<span class="optional">(tuỳ chọn)</span></label><span class="woocommerce-input-wrapper"><?= isset($_POST['notes']) ? $_POST['notes'] : "" ?></span></p>
                                </div>
                            </div>
                        </div>
                    </div>



                </div><!-- large-7 -->

                <div class="large-5 col">

                    <div class="col-inner has-border">
                        <div class="checkout-sidebar sm-touch-scroll">
                            <h3 id="order_review_heading">Đơn hàng của bạn</h3>


                            <div id="order_review" class="woocommerce-checkout-review-order">
                                <table class="shop_table woocommerce-checkout-review-order-table">
                                    <thead>
                                        <tr>
                                            <th class="product-name">Sản phẩm</th>
                                            <th class="product-total">Tạm tính</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($cart['details'] as $row) : ?>
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    <?= $row->{pick_language($row)} ?>&nbsp; <strong class="product-quantity">×&nbsp;<?= $row->qty ?></strong> </td>
                                                <td class="product-total">
                                                    <span class="woocommerce-Price-amount amount"><?= number_format($row->amount, 0, ",", ".") ?>&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span></span>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                    <tfoot>

                                        <tr class="order-total">
                                            <th>Tổng</th>
                                            <td><strong><span class="woocommerce-Price-amount amount"><?= number_format($cart['paid_amount'], 0, ",", ".") ?>&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span></span></strong> </td>
                                        </tr>


                                    </tfoot>
                                </table>


                            </div>

                            <div class="woocommerce-privacy-policy-text"></div>
                        </div>
                    </div>

                </div><!-- large-5 -->

            </div><!-- row -->
        </div>

    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section("script") ?>
<?= $this->endSection() ?>