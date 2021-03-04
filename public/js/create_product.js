// 切换秒杀样式
$("input[name='is_seckill']").click(function () {
    var value = $("input[name='is_seckill']:checked").val()
    if (value == 1) {
        $('.seckill_time').css('display', 'block')
        $('.discount_temp').css('display', 'none')
    } else {
        $('.seckill_time').css('display', 'none')
        $('.discount_temp').css('display', 'block')
    }
})

// 启动时间插件
$('.change_time').daterangepicker({
    "singleDatePicker": true,
    "locale": {
        "format": "YYYY-MM-DD",
        "daysOfWeek": ["日", "一", "二", "三", "四", "五", "六"],
        "monthNames": ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"],
    },
});

$(".add_file").click(function () {
    var length = $(".files").children().length;
    if (length >= 8) {
        alert('最多只能添加8个商品参数~');
        return false;
    }
    var i = length + 1;
    var html = '<div class="am-form-group">' +
        '<div class="am-u-sm-12 am-u-md-3">' +
        '<input type="text" class="file' + i + '" name="parame_name[]">' +
        '</div>' +
        '<div class="am-u-sm-12 am-u-md-3">' +
        '<input type="text" class="file' + i + '" name="parame_value[]">' +
        '</div>' +
        '<div class="am-u-sm-12 am-u-md-6">' +
        '<a href="javascript:;" class="am-icon-close del_one" data-id=""></a>' +
        '</div>' +
        '</div>';
    $(".files").append(html);
})

//js删除表单
$(document).on('click', '.del_one', function () {
    $(this).parents('.am-form-group').remove();
});
