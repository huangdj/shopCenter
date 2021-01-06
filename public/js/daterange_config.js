$(function () {
    //时间插件
    $("#created_at").daterangepicker({
        autoUpdateInput: false,
        locale: {
            "applyLabel": "确定",
            "cancelLabel": "取消",
            'daysOfWeek': ['一', '二', '三', '四', '五', '六', '日'],
            'monthNames': ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
        },
    }, function (startDate, endDate, label) {  //匿名函数
        this.element[0].value = startDate.format('YYYY-MM-DD') + ' ~ ' + endDate.format('YYYY-MM-DD');
    });
});
