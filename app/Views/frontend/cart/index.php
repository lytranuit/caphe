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

                        <li wfd-id="117"><strong><span wfd-id="118">Giỏ hàng</span></strong></li>

                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>
<section class="main-cart-page main-container col1-layout page_background" wfd-id="74">
    <div class="main container hidden-xs hidden-sm" wfd-id="76">
        <div class="wrap_background_aside padding-top-15 margin-bottom-40" wfd-id="77">
            <div class="header-cart" wfd-id="108">
                <h1 class="title_cart hidden">
                    <span wfd-id="110">Giỏ hàng</span>
                </h1>
                <div class="header-cart title_cart_pc hidden-sm hidden-xs" wfd-id="109">

                </div>
            </div>
            <div class="col-main cart_desktop_page cart-page" wfd-id="78">
                <div class="cart page_cart hidden-xs hidden-sm" wfd-id="79">
                    <form action="/cart" method="post" novalidate="" class="margin-bottom-0" wfd-id="86">
                        <div class="bg-scroll" wfd-id="87">
                            <div class="cart-thead" wfd-id="101">
                                <div style="width: 18%" class="a-center" wfd-id="107">Hình ảnh</div>
                                <div style="width: 37%" class="a-center" wfd-id="106">Thông tin sản phẩm</div>
                                <div style="width: 17%" class="a-center" wfd-id="104"><span class="nobr" wfd-id="105">Đơn giá</span></div>
                                <div style="width: 14%" class="a-center" wfd-id="103">Số lượng</div>
                                <div style="width: 14%" class="a-center" wfd-id="102">Thành tiền</div>
                            </div>
                            <div class="cart-tbody" wfd-id="88">
                                <?php foreach ($cart['details'] as $row) : ?>
                                    <div class="item-cart productid-23679264 product" wfd-id="89" data-id="<?= $row->id ?>">
                                        <div style="width: 18%" class="image" wfd-id="100"><a class="product-image" title="<?= $row->{pick_language($row)} ?>" href="<?= url_product($row->id) ?>"><img width="75" height="auto" alt="<?= $row->{pick_language($row)} ?>" src="<?= base_url(isset($row->image->src) ? $row->image->src : "assets/images/placeholder.png") ?>"></a></div>
                                        <div style="width: 37%" class="a-center" wfd-id="98">
                                            <h3 class="product-name"> <a class="text2line" href="<?= url_product($row->id) ?>" title="<?= $row->{pick_language($row)} ?>"><?= $row->{pick_language($row)} ?></a> </h3><span class="variant-title" style="display: none;" wfd-id="99">Default Title</span><a class="remove remove_product" title="Xóa" href="javascript:;" data-id="23679264">Xóa</a>
                                        </div>
                                        <div style="width: 17%" class="a-center" wfd-id="95"><span class="item-price" wfd-id="96"> <span class="price" wfd-id="97"><?= number_format($row->price, 0, ",", ".") ?>₫</span></span></div>
                                        <div style="width: 14%" class="a-center" wfd-id="93">
                                            <div class="input_qty_pr number-widget" wfd-id="94">
                                                <input type="text" readonly="" min="1" class="check_number_here input-text number-sidebar input_pop input_pop input_qty" id="qtyItem23679264" name="Lines" size="4" value="<?= $row->qty ?>" wfd-id="184">
                                                <button class="increase_pop items-count btn-plus up" type="button" wfd-id="194">
                                                    <i class="fa fa-caret-up"></i></button>
                                                <button class="reduced_pop items-count btn-minus down" type="button" wfd-id="193"><i class="fa fa-caret-down"></i></button>
                                            </div>
                                        </div>
                                        <div style="width: 14%" class="a-center" wfd-id="90"><span class="cart-price" wfd-id="91"> <span class="price" wfd-id="92"><?= number_format($row->amount, 0, ",", ".") ?>₫</span> </span></div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </form>
                    <div class="rows pagee_checkout" wfd-id="80">
                        <div class="col-lg-5 col-md-5" wfd-id="83">
                            <div class="form-cart-button" wfd-id="84">
                                <div class="" wfd-id="85"><a href="/" class="form-cart-continue">Tiếp tục mua hàng</a></div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 bg_cart shopping-cart-table-total" wfd-id="81">
                            <div class="table-total" wfd-id="82">
                                <table class="table ">
                                    <tbody>
                                        <tr>
                                            <td class="total-text">Tổng tiền thanh toán</td>
                                            <td class="txt-right totals_price price_end"><?= number_format($cart['amount_product'], 0, ",", ".") ?>₫</td>
                                            <td class="thanhtoan"><a onclick="window.location.href='/cart/checkout'" class="btn-checkout-cart button_checkfor_buy">Tiến hành thanh toán</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wrap_background_aside padding-top-15 margin-bottom-40 padding-left-0 padding-right-0 hidden-md hidden-lg" wfd-id="75">
        <div class="cart-mobile">
            <div>
                <div class="header-cart">

                    <div class="title-cart title_cart_mobile">
                        <h3>Giỏ hàng</h3>
                    </div>

                </div>

                <div class="header-cart-content" style="background:#fff;">
                    <div class="cart_page_mobile content-product-list">

                        <?php foreach ($cart['details'] as $row) : ?>
                            <div class="item-product item productid-23679264 product" data-id="<?= $row->id ?>">
                                <div class="item-product-cart-mobile"><a href="<?= url_product($row->id) ?>"> </a><a class="product-images1" href="" title="<?= $row->{pick_language($row)} ?>"><img width="80" height="150" src="<?= base_url(isset($row->image->src) ? $row->image->src : "assets/images/placeholder.png") ?>" alt="<?= $row->{pick_language($row)} ?>"></a></div>
                                <div class="title-product-cart-mobile">
                                    <h3><a href="<?= url_product($row->id) ?>" title="<?= $row->{pick_language($row)} ?>"><?= $row->{pick_language($row)} ?></a></h3>
                                    <p>Giá: <span><?= number_format($row->price, 0, ",", ".") ?>₫</span></p>
                                </div>
                                <div class="select-item-qty-mobile">
                                    <div class="txt_center">
                                        <div class="input_qty_pr number-widget" wfd-id="94">
                                            <input type="text" readonly="" min="1" class="check_number_here input-text number-sidebar input_pop input_pop input_qty" id="qtyItem23679264" name="Lines" size="4" value="<?= $row->qty ?>" wfd-id="184">
                                            <button class="increase_pop items-count btn-plus up" type="button" wfd-id="194">
                                                <i class="fa fa-caret-up"></i></button>
                                            <button class="reduced_pop items-count btn-minus down" type="button" wfd-id="193"><i class="fa fa-caret-down"></i></button>
                                        </div>
                                    </div>
                                    <a class="button remove remove_product" href="javascript:;" data-id="23679264">Xoá</a>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <div class="header-cart-price" style="">
                        <div class="title-cart">
                            <h3 class="text-xs-left">Tổng tiền</h3><a class="text-xs-right pull-right totals_price_mobile"><?= number_format($cart['amount_product'], 0, ",", ".") ?>₫</a>
                        </div>
                        <div class="checkout"><button class="btn-proceed-checkout-mobile" title="Tiến hành thanh toán" type="button" onclick="window.location.href='/cart/checkout'" wfd-id="190"><span>Tiến hành thanh toán</span></button>
                            <button class="form-cart-continue btn f-left" title="Tiếp tục mua hàng" type="button" onclick="window.location.href='/'" wfd-id="189"><span>Tiếp tục mua hàng</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section("script") ?>
<?= $this->endSection() ?>