<?php

return [
    'page_size' => env('PAGE_SIZE', '12'),
    'order_status' => [
        1 => '待付款',       //下单
        2 => '待发货',       //付款
        3 => '配货中',       //配货
        4 => '待收货',       //出库
        5 => '交易成功',       //交易成功
    ],
];
