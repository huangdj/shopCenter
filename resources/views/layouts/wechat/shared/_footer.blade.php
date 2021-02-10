<div class="footbox">
    <div class="footer">
        <ul>
            <li class="{{ $_home ?? '' }}">
                <a href="/">
                    <img src="/vendor/wechat/images/f01.png"/>
                    <p>首页</p>
                </a>
            </li>
{{--            <li>--}}
{{--                <a href="message.html">--}}
{{--                    <img src="/vendor/wechat/images/f02.png"/>--}}
{{--                    <p>发现</p>--}}
{{--                </a>--}}
{{--            </li>--}}
            <li class="{{ $_cart ?? '' }}">
                <a href="/cart">
                    <img src="/vendor/wechat/images/f03.png"/>
                    <p>购物车</p>
                </a>
            </li>
            <li class="{{ $_customer ?? '' }}">
                <a href="/customer">
                    <img src="/vendor/wechat/images/f04.png"/>
                    <p>我的</p>
                </a>
            </li>
        </ul>
    </div>
</div>
