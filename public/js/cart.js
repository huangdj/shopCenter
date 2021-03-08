//删除
$(".del").click(function () {
    var _this = $(this);
    if (confirm('确定要删除么?')) {
        $.ajax({
            type: 'DELETE',
            url: '/cart',
            data: {id: _this.parents(".num").data('id')},
            success: function (data) {
                var length = $(".gwcone").length;
                if (length == 1) {
                    $('#carts').hide();
                    $('#more').show();
                    window.location.reload()
                }
                $("#num").text('去结算(' + data.num + ')');
                $("#total_price").text('￥' + data.total_price);
                _this.parents('.gwcone').remove();
                window.location.reload()
            }
        })
    }
})

$('.input-add').click(function () {
    var _this = $(this);

    var $num = _this.siblings('.input-num');
    var $sub = _this.siblings('.input-sub');
    var price = _this.parents(".num").data('price');
    var num = $num.text();
    num = parseInt(num) + 1;
    $num.text(num);

    var hj = '￥' + (num * price).toFixed(2);
    _this.parents('.info').find('.hj').text(hj);

    $.ajax({
        type: 'PATCH',
        url: '/cart',
        data: {
            id: _this.parents(".num").data('id'),
            type: 'add'
        },
        success: function (data) {
            // console.log(data)
            $("#num").text('去结算(' + data.num + ')');
            $("#total_price").text('￥' + data.total_price);
            location.href = location.href
        }
    })
})

//减少数量
$(".input-sub").click(function () {
    var _this = $(this);
    var $num = _this.siblings('.input-num');
    var num = $num.text();
    var price = _this.parents(".num").data('price');

    if (num == 1) {
        return false;
    }

    num = parseInt(num) - 1;
    if (num == 1) {
        _this.removeClass('active');
    }

    $num.text(num);

    var hj = '￥' + (num * price).toFixed(2);
    _this.parents('.info').find('.hj').text(hj);

    $.ajax({
        type: 'PATCH',
        url: '/cart',
        data: {
            id: _this.parents(".num").data('id'),
            type: 'sub'
        },
        success: function (data) {
            // console.log(data)
            $("#num").text('去结算(' + data.num + ')');
            $("#total_price").text('￥' + data.total_price);
            location.href = location.href
        }
    })
})

// 加入购物车
$('.add_cart').click(function () {
    var product_id = $(this).data('pid')
    $.ajax({
        type: 'POST',
        url: '/cart',
        data: {product_id: product_id},
        success: function () {
            location.href = '/cart';
        }
    })
})
