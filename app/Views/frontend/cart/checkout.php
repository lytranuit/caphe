<?= $this->extend('frontend/layouts/main') ?>


<?= $this->section('content') ?>

<div class="breadcrumb_nobackground margin-bottom-40" wfd-id="111">
    <section class="bread-crumb" wfd-id="112">
        <span class="crumb-border" wfd-id="122"></span>
        <div class="container" wfd-id="113">
            <div class="row" wfd-id="114">
                <div class="col-xs-12 a-left" wfd-id="115">
                    <ul class="breadcrumb" wfd-id="116">
                        <li class="home" wfd-id="119">
                            <a href="/"><span wfd-id="121">Trang chủ</span></a>
                            <span class="mr_lr" wfd-id="120"><i class="fas fa-circle"></i></span>
                        </li>

                        <li wfd-id="117"><strong><span wfd-id="118">Thanh toán</span></strong></li>

                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="cart-container container page-wrapper page-checkout">
    <div class="woocommerce">
        <div class="woocommerce-notices-wrapper"></div>
        <form name="checkout" method="post" class="checkout woocommerce-checkout " action="<?= base_url("cart/complete") ?>">

            <div class="row pt-0 ">
                <div class="col-md-7">


                    <div id="customer_details">
                        <div class="clear">
                            <div class="woocommerce-billing-fields">

                                <h3>Thông tin thanh toán</h3>
                                <div class="woocommerce-billing-fields__field-wrapper">
                                    <p class="form-row form-row-wide validate-required" id="billing_last_name_field" data-priority="10"><label for="billing_last_name" class="">Họ và tên&nbsp;<abbr class="required" title="bắt buộc">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " required name="name" id="billing_last_name" placeholder="Nhập đầy đủ họ và tên" value=""></span></p>
                                    <p class="form-row form-row-last thwcfd-field-wrapper thwcfd-field-tel validate-required validate-phone" id="billing_phone_field" data-priority="20"><label for="billing_phone" class="">Số điện thoại&nbsp;<abbr class="required" title="bắt buộc">*</abbr></label><span class="woocommerce-input-wrapper"><input type="tel" required class="input-text " name="phone" id="billing_phone" placeholder="" value="" autocomplete="tel"></span></p>
                                    <p class="form-row form-row-first thwcfd-field-wrapper thwcfd-field-email validate-required validate-email" id="billing_email_field" data-priority="21"><label for="billing_email" class="">Địa chỉ email&nbsp;<abbr class="required" title="bắt buộc">*</abbr></label><span class="woocommerce-input-wrapper"><input type="email" required class="input-text " name="email" id="billing_email" placeholder="" value="" autocomplete="email username"></span></p>
                                    <p class="form-row form-row-wide validate-required" id="billing_address_1_field" data-priority="60"><label for="billing_address_1" class="">Địa chỉ&nbsp;<abbr class="required" title="bắt buộc">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="address" id="billing_address_1" required placeholder="Ví dụ: Số 20, ngõ 90" value="" autocomplete="address-line1"></span></p>
                                </div>

                            </div>


                        </div>

                        <div class="clear">
                            <div class="woocommerce-additional-fields">
                                <div class="woocommerce-additional-fields__field-wrapper">
                                    <p class="form-row notes thwcfd-field-wrapper thwcfd-field-textarea" id="order_comments_field" data-priority=""><label for="order_comments" class="">Ghi chú đơn hàng&nbsp;<span class="optional">(tuỳ chọn)</span></label><span class="woocommerce-input-wrapper"><textarea name="notes" class="input-text " id="order_comments" placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn." rows="2" cols="5"></textarea></span></p>
                                </div>
                            </div>
                        </div>
                    </div>



                </div><!-- large-7 -->

                <div class="col-md-5">

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

                                <div id="payment" class="woocommerce-checkout-payment">

                                    <div class="form-row place-order text-center">
                                        <button type="submit" class="btn-checkout-cart" name="woocommerce_checkout_place_order" id="place_order" value="Đặt hàng" data-value="Đặt hàng">Đặt hàng</button>
                                    </div>
                                </div>

                            </div>

                            <div class="woocommerce-privacy-policy-text"></div>
                        </div>
                    </div>

                </div><!-- large-5 -->

            </div><!-- row -->
        </form>

    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section("script") ?>
<?= $this->endSection() ?>