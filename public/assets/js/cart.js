///REQUIRE 
/////autoNumeric
/////cookies
/////toast


$(document).ready(function () {

    /*CART*/

    //init_cart_icon()
    initCart();

    $(document).on("click", ".add_to_cart", function () {
        var data_cart = $.cookies.get('DATA_CART') || {};
        var cart = data_cart['details'] || [];
        /*
         * 
         */
        //        var count = $('.shop-cart .cart_count span');
        var product = $(this).closest(".product");
        var id = product.data("id");
        var qty = parseInt($(".number", product).val());
        var index = -1;
        $.each(cart, function (i, v) {
            if (v.id == id)
                index = i;
        });
        if (index != -1) {
            cart[index].qty = parseInt(cart[index].qty) + qty;
        } else {
            cart.push({ id: id, qty: qty });
        }
        data_cart['details'] = cart;
        $.cookies.set('DATA_CART', data_cart);

        initCart();
        //init_cart_icon()


        swal({
            title: "",
            type: 'success',
            showConfirmButton: true,
            confirmButtonText: 'Giỏ hàng',
            timer: 3000,
        }, function (isConfirm) {
            if (isConfirm) {
                location.href = path + "cart";
            }
            swal.close();
        });
        return false;
    });

    $('.up').click(function (e) {
        e.preventDefault();
        var parent = $(this).parents(".product");
        var input_qty = $('.input_qty', parent);
        var currentVal = parseInt(input_qty.val());
        if (!isNaN(currentVal)) {
            input_qty.val(currentVal + 1);
        } else {
            input_qty.val(1);
        }
        input_qty.trigger("change");
    });
    $(".down").click(function (e) {
        e.preventDefault();
        console.log(1);
        var parent = $(this).parents(".product");
        var input_qty = $('.input_qty', parent);

        var currentVal = parseInt(input_qty.val());
        if (!isNaN(currentVal) && currentVal > 0) {
            input_qty.val(currentVal - 1);
        } else {
            input_qty.val(1);
        }
        input_qty.trigger("change");
    });
    $(".input_qty").change(function () {
        var value = $(this).val();
        var parent = $(this).parents(".product");
        var data_cart = $.cookies.get('DATA_CART') || {};
        var cart = data_cart['details'] || [];
        var id = parent.data("id");
        var index = -1;
        $.each(cart, function (i, v) {
            if (v.id == id)
                index = i;
        });
        if (index != -1) {
            cart[index].qty = value;
        }

        data_cart['details'] = cart;
        console.log(cart);
        $.cookies.set('DATA_CART', data_cart);
        $(".loading-modal").addClass("show");
        $("#cboxOverlay").show();
        location.reload();
    });

    $(document).on("click", ".remove_product", function (e) {
        e.preventDefault();
        if (confirm("Xóa sản phẩm này") == true) {
            var parent = $(this).parents(".product");
            var id = parent.data("id");
            var data_cart = $.cookies.get('DATA_CART') || {};
            var cart = data_cart['details'] || [];
            var index = -1;
            $.each(cart, function (i, v) {
                if (v.id == id)
                    index = i;
            });
            if (index != -1) {
                cart.splice(index, 1);
            }
            data_cart['details'] = cart;
            $.cookies.set('DATA_CART', data_cart);
            parent.remove();
            $(".loading-modal").addClass("show");
            $("#cboxOverlay").show();
            location.reload();
        }
    })
})

function initCart() {
    var cart = $.cookies.get('DATA_CART');
    var count = 0;
    var amount = 0;
    if (cart) {
        var self = this;
        $.each(cart['details'], function (i, obj) {
            count += parseInt(obj.qty);

        });
    }
    $('.count_item').text(count);

    if (count == 0) {
        $('.count_item').hide();
    } else {
        $('.count_item').show();
    }
    // $.ajax({
    //     url: path + "ajax/cart",
    //     data: {},
    //     dataType: "HTML",
    //     success: function (data) {
    //         $(".widget_shopping_cart_content").html(data);
    //     }
    // })

}

function number_format(number, decimals, decPoint, thousandsSep) { // eslint-disable-line camelcase
    //  discuss at: https://locutus.io/php/number_format/
    // original by: Jonas Raoni Soares Silva (https://www.jsfromhell.com)
    // improved by: Kevin van Zonneveld (https://kvz.io)
    // improved by: davook
    // improved by: Brett Zamir (https://brett-zamir.me)
    // improved by: Brett Zamir (https://brett-zamir.me)
    // improved by: Theriault (https://github.com/Theriault)
    // improved by: Kevin van Zonneveld (https://kvz.io)
    // bugfixed by: Michael White (https://getsprink.com)
    // bugfixed by: Benjamin Lupton
    // bugfixed by: Allan Jensen (https://www.winternet.no)
    // bugfixed by: Howard Yeend
    // bugfixed by: Diogo Resende
    // bugfixed by: Rival
    // bugfixed by: Brett Zamir (https://brett-zamir.me)
    //  revised by: Jonas Raoni Soares Silva (https://www.jsfromhell.com)
    //  revised by: Luke Smith (https://lucassmith.name)
    //    input by: Kheang Hok Chin (https://www.distantia.ca/)
    //    input by: Jay Klehr
    //    input by: Amir Habibi (https://www.residence-mixte.com/)
    //    input by: Amirouche
    //   example 1: number_format(1234.56)
    //   returns 1: '1,235'
    //   example 2: number_format(1234.56, 2, ',', ' ')
    //   returns 2: '1 234,56'
    //   example 3: number_format(1234.5678, 2, '.', '')
    //   returns 3: '1234.57'
    //   example 4: number_format(67, 2, ',', '.')
    //   returns 4: '67,00'
    //   example 5: number_format(1000)
    //   returns 5: '1,000'
    //   example 6: number_format(67.311, 2)
    //   returns 6: '67.31'
    //   example 7: number_format(1000.55, 1)
    //   returns 7: '1,000.6'
    //   example 8: number_format(67000, 5, ',', '.')
    //   returns 8: '67.000,00000'
    //   example 9: number_format(0.9, 0)
    //   returns 9: '1'
    //  example 10: number_format('1.20', 2)
    //  returns 10: '1.20'
    //  example 11: number_format('1.20', 4)
    //  returns 11: '1.2000'
    //  example 12: number_format('1.2000', 3)
    //  returns 12: '1.200'
    //  example 13: number_format('1 000,50', 2, '.', ' ')
    //  returns 13: '100 050.00'
    //  example 14: number_format(1e-8, 8, '.', '')
    //  returns 14: '0.00000001'

    number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
    var n = !isFinite(+number) ? 0 : +number
    var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
    var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
    var dec = (typeof decPoint === 'undefined') ? '.' : decPoint
    var s = ''

    var toFixedFix = function (n, prec) {
        if (('' + n).indexOf('e') === -1) {
            return +(Math.round(n + 'e+' + prec) + 'e-' + prec)
        } else {
            var arr = ('' + n).split('e')
            var sig = ''
            if (+arr[1] + prec > 0) {
                sig = '+'
            }
            return (+(Math.round(+arr[0] + 'e' + sig + (+arr[1] + prec)) + 'e-' + prec)).toFixed(prec)
        }
    }

    // @todo: for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec).toString() : '' + Math.round(n)).split('.')
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || ''
        s[1] += new Array(prec - s[1].length + 1).join('0')
    }

    return s.join(dec)
}

function detectMob() {
    return (window.innerWidth <= 800);
}