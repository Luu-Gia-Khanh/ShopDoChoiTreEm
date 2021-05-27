$(document).ready(function () {
    $('.btn_addcart').click(function () {
        var id = $('.product_id').val();
        var qty = $('.qty_' + id).val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: '../add_to_cart',
            method: 'POST',
            data: {
                id: id,
                qty: qty,
                _token: _token
            },
            success: function (data) {
                swal({
                        title: "Đã thêm sản phẩm vào giỏ hàng",
                        text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                        type: "success",
                        showCancelButton: true,
                        cancelButtonText: "Xem tiếp",
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "Đi đến giỏ hàng",
                        closeOnConfirm: false
                    },
                    function () {
                        window.location.href = '../show_cart';
                    });
                //alert(data);
            }
        });
    });

    $('.btnUp').click(function () {
        id = $(this).data('id_cart');
        qty = $('.qty_' + id).val();
        qty++;
        _token = $('input[name="_token"]').val();
        $.ajax({
            url: 'update_cart',
            method: 'POST',
            data: {
                id: id,
                qty: qty,
                _token: _token
            },
            success: function () {
                location.reload();
            }
        });
    });
    $('.btnDown').click(function () {
        id = $(this).data('id_cart');
        qty = $('.qty_' + id).val();
        qty--;
        _token = $('input[name="_token"]').val();
        $.ajax({
            url: 'update_cart',
            method: 'POST',
            data: {
                id: id,
                qty: qty,
                _token: _token
            },
            success: function () {
                location.reload();
            }
        });
    });

    $('#voucher').blur(function () {
        voucher = $('#voucher').val();
        subtotal = $('#subtotal').val();
        _token = $('input[name="_token"]').val();
        $.ajax({
            url: 'admin/voucher/check_coupon',
            method: 'POST',
            data: {
                voucher: voucher,
                _token: _token,
                subtotal: subtotal
            },
            success: function (data) {
                if (!isNaN(data)) {
                    $('#span_voucher').html('-' + number_format(data, 0, ',', '.') +
                        'đ');
                } else {
                    $('#span_voucher').html(data);
                }
                total = $('#v_total').val();
                if (!isNaN(data)) {
                    $('#total').html(number_format(total - data, 0, ',', '.') +
                        'đ');
                    $('#v_total').val(total - data);
                } else {
                    $('#total').html(total);
                }
            }
        });
    });
    $('#voucher').keyup(function () {
        $("[name=payment]").prop('checked', false);
    });

});


function view() {
    if (localStorage.getItem('data') != null) {
        var data = JSON.parse(localStorage.getItem('data'));
        data.reverse();
        for (i = 0; i < data.length; i++) {
            var name = data[i].name;
            var price = data[i].price;
            var image = data[i].image;
            var url = data[i].url;
            var id = data[i].id;
            $('#content_wishlist').append(
                '<li><div class="minicart-item"><div class="thumb"><a href="desc_product/' + id +
                '"><img src="' + image +
                '" width="90" height="90" alt="National Fresh"></a></div><div class="left-info"><div class="product-title"><a href="desc_product/' +
                id + '" class="product-name">' +
                name +
                '</a></div><div class="price"><ins><span class="price-amount"><span class="currencySymbol"></span>' +
                price +
                'đ</span></ins></div></div><div class="action"><a class="delete_withlist" data-id =' + id +
                '><i class="fa fa-trash-o" aria-hidden="true"></i></a></div></div></li>'
            );
            $('#qty_wishlist').text(data.length);
        }
    } else {
        $('#wk').html('ok fail');
    }
}
view();

function add_wishlish(wish_id) {
    var id = wish_id;
    var name = document.getElementById('wishlist_name' + id).value;
    var price = document.getElementById('wishlist_price' + id).value;
    var image = document.getElementById('wishlist_image' + id).src;
    var url = document.getElementById('wishlist_productUrl' + id).href;
    var newItem = {
        'url': url,
        'id': id,
        'name': name,
        'price': price,
        'image': image
    }
    if (localStorage.getItem('data') == null) {
        localStorage.setItem('data', '[]');
    }
    var old_data = JSON.parse(localStorage.getItem('data'));

    var matches = $.grep(old_data, function (obj) {
        return obj.id == id;
    })
    if (matches.length) {
        alert('sản phẩm đã tồn tại trong wishlist');
    } else {
        old_data.push(newItem);
        localStorage.setItem('data', JSON.stringify(old_data));
        $('#content_wishlist').append(
            '<li><div class="minicart-item"><div class="thumb"><a href="desc_product/"><img src="' + newItem
            .image +
            '" width="90" height="90" alt="National Fresh"></a></div><div class="left-info"><div class="product-title"><a href="#" class="product-name">' +
            name +
            '</a></div><div class="price"><ins><span class="price-amount"><span class="currencySymbol"></span>' +
            price +
            'đ</span></ins></div></div><div class="action"><a class="delete_withlist" data-id =' + newItem
            .id + '><i class="fa fa-trash-o" aria-hidden="true"></i></a></div></div></li>'
        );
    }
}
$(document).on('click', '.delete_withlist', function (event) {
    event.preventDefault();
    var id = $(this).data('id');
    var result = JSON.parse(localStorage.getItem('data'));
    //alert(result.length);
    if (result && result.length > 1) {
        for (var i = 0; i < result.length; i++) {
            if (result[i].id == id) {
                result.splice(i, i);
                break;
            }
        }
        localStorage.setItem('data', JSON.stringify(result));
        location.reload();
        // swal({
        //     title: 'Sản phẩm đã được xóa khỏi danh mục yêu thích của bạn!!!',
        //     icon: "success",
        //     button: "Quay lại",
        // }).then(ok => {
        //     //window.location.reload();
        //     alert('test1');
        // });

    }
    if (result.length == 1) {
        for (var i = 0; i < result.length; i++) {
            if (result[i].id == id) {
                result.splice(i, 1);
                break;
            }
        }
        localStorage.setItem('data', JSON.stringify(result));
        location.reload();
        // swal({
        //     title: 'Sản phẩm đã được xóa khỏi danh mục yêu thích!!!',
        //     icon: "success",
        //     button: "Quay lại",
        // }).then(ok => {
        //     //window.location.reload();
        //     alert('test2');
        // });
    }

});


function upberFirstKey() {
    var str = document.getElementById('name').value;
    str = str.toLowerCase().replace(/^[\u00C0-\u1FFF\u2C00-\uD7FF\w]|\s[\u00C0-\u1FFF\u2C00-\uD7FF\w]/g,
        function (letter) {
            return letter.toUpperCase();
        });
    document.getElementById('name').value = str;
}

function number_format(number, decimals, dec_point, thousands_sep) {
    // Strip all characters but numerical ones.
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}
