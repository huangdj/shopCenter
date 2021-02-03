<?php
/**
 * 栏目名前面加上缩进
 * @param $count
 * @return string
 */
function indent_category($count)
{
    $str = '';
    for ($i = 1; $i < $count; $i++) {
        $str .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
    }
    return $str;
}

/**
 * 截取, 并加上...
 * @param $string
 * @param $size
 * @param bool $dot 是否加上..., 默认true
 * @return string
 */
function sub($string, $size = 24, $dot = true)
{
    $string = strip_tags(trim($string));
    if (strlen($string) > $size) {
        $string = mb_substr($string, 0, $size);
        $string .= $dot ? '...' : '';
        return $string;
    }

    return $string;
}


//是否...
function is_something($attr, $module)
{
    return $module->$attr ? '<span class="am-icon-check is_something" data-attr="' . $attr . '"></span>' : '<span class="am-icon-close is_something" data-attr="' . $attr . '"></span>';
}

/***
 * 根据当前时间显示礼貌提示语
 * @return string
 */
function getTime()
{
    $no = date("H", time());
    if ($no >= 0 && $no <= 6) {
        return "凌晨好";
    }
    if ($no > 7 && $no <= 8) {
        return "早上好";
    }
    if ($no > 9 && $no < 12) {
        return "上午好";
    }
    if ($no >= 12 && $no < 13) {
        return "中午好";
    }
    if ($no >= 13 && $no <= 18) {
        return "下午好";
    }
    if ($no > 18 && $no <= 24) {
        return "晚上好";
    }
    return "您好";
}


/**
 * 1=> '下单',       //待支付
 * 2=> '付款',       //待发货
 * 3=> '配货',
 * 4=> '出库',       //待收货
 * 5=> '交易成功',    //已完成
 */
function order_color($status)
{
    switch ($status) {
        case '1':
            return 'uc-order-item-pay';         //橙
            break;
        case '2':
            return 'uc-order-item-shipping';    //红
            break;
        case '3':
            return 'uc-order-item-shipping';    //红
            break;
        case '4':
            return 'uc-order-item-receiving';   //绿
            break;
        case '5':
            return 'uc-order-item-finish';      //灰
            break;
        default:
            return 'uc-order-item-finish';
    }
}

/**
 * 订单状态
 * @param $status
 * @return mixed
 */
function order_status($status)
{
    $info = config('admin.order_status');
    return $info["$status"];
}

function time_format($attr, $datetime)
{
    if ($datetime == "") {
        return "";
    }
    return date($attr, strtotime($datetime));
}


//显示分类对应商品
function show_category_products($category)
{
    if (!$category->products->isEmpty()) {
        return '<a class="am-badge am-badge-secondary" href="' . route('admin.products.index', ['category_id' => $category->id]) . '">查看商品</a>';
    }
}
