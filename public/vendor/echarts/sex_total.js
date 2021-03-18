$.get('/api/sex_total').done(function (data) {
    var sex_total = echarts.init(document.getElementById('sex_total'), 'macarons');

    // 指定图表的配置项和数据
    sex_total.setOption({
        title: {
            text: '会员性别统计',
            subtext: '来自数据库',
            left: 'center'
        },
        tooltip: {
            trigger: 'item'
        },
        legend: {
            orient: 'vertical',
            left: 'left',
        },
        series: [
            {
                name: '访问来源',
                type: 'pie',
                radius: '50%',
                data: data,
                emphasis: {
                    itemStyle: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ]
    });
})
