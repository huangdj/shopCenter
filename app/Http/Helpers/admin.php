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
