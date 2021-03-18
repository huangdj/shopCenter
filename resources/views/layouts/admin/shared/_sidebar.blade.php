<div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
        <ul class="am-list admin-sidebar-list">
            <li>
                <a href="/admin" class="{{ $_admin ?? '' }}">
                    <span class="am-icon-dashboard"></span>Dashboard
                </a>
            </li>

            <li class="admin-parent">
                <a class="am-cf" data-am-collapse="{target: '#collapse-product'}">
                    <span class="am-icon-product-hunt"></span>商品管理 <span class="am-icon-angle-right am-fr am-margin-right"></span>
                </a>
                <ul class="am-list am-collapse admin-sidebar-sub {{ $_product ?? '' }}" id="collapse-product">
                    <li>
                        <a href="{{ route('admin.brands.index') }}" class="{{ $_brand ?? '' }}">
                            <span class="am-icon-apple"></span>商品品牌
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.categories.index') }}" class="{{ $_category ?? '' }}">
                            <span class="am-icon-calendar"></span>商品分类
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.products.index') }}" class="{{ $_productList ?? '' }}">
                            <span class="am-icon-reorder"></span>商品列表
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('admin.themes.index') }}" class="{{ $_theme ?? '' }}">
                    <span class="am-icon-themeisle"></span>主题管理
                </a>
            </li>
            <li>
                <a href="{{ route('admin.adverts.index') }}" class="{{ $_advert ?? '' }}">
                    <span class="am-icon-google"></span>广告管理
                </a>
            </li>
            <li>
                <a href="{{ route('admin.notices.index') }}" class="{{ $_notice ?? '' }}">
                    <span class="am-icon-bullhorn"></span>通知管理
                </a>
            </li>
            <li>
                <a href="{{ route('admin.express.index') }}" class="{{ $_express ?? '' }}">
                    <span class="am-icon-truck"></span>物流管理
                </a>
            </li>
            <li>
                <a href="{{ route('admin.menu.edit') }}" class="{{ $_menu ?? '' }}">
                    <span class="am-icon-wechat"></span>微信管理
                </a>
            </li>
            <li class="admin-parent">
                <a class="am-cf" data-am-collapse="{target: '#collapse-order'}">
                    <span class="am-icon-shopping-cart"></span>订单管理 <span class="am-icon-angle-right am-fr am-margin-right"></span>
                </a>
                <ul class="am-list am-collapse admin-sidebar-sub {{ $_order ?? '' }}" id="collapse-order">
                    <li>
                        <a href="/admin/orders/reminds" class="{{ $_reminds ?? '' }}">
                            <span class="am-icon-volume-up"></span>订单提醒
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.orders.index') }}" class="{{ $_orderList ?? '' }}">
                            <span class="am-icon-list-ul"></span>订单列表
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.appraises.index') }}" class="{{ $_appraise ?? '' }}">
                            <span class="am-icon-commenting-o"></span>订单评价
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('admin.customers.index') }}" class="{{ $_customer ?? '' }}">
                    <span class="am-icon-user"></span>会员管理
                </a>
            </li>
            <li>
                <a href="{{ route('admin.config.setting') }}" class="{{ $_setting ?? '' }}">
                    <span class="am-icon-gear am-icon-spin"></span>系统设置
                </a>
            </li>
            <li>
                <a href="{{ route('admin.coupons.index') }}" class="{{ $_coupon ?? '' }}">
                    <span class="am-icon-ticket"></span>优惠券管理
                </a>
            </li>
            <li>
                <a href="{{ route('admin.visualized.index') }}" class="{{ $_visualized ?? '' }}">
                    <span class="am-icon-vine"></span>数据可视化
                </a>
            </li>
        </ul>
    </div>
</div>
