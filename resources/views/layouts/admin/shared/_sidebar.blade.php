<div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
        <ul class="am-list admin-sidebar-list">
            <li>
                <a href="/admin" class="{{ $_admin ?? '' }}">
                    <span class="am-icon-dashboard"></span> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.brands.index') }}" class="{{ $_brand ?? '' }}">
                    <span class="am-icon-apple"></span> 商品品牌
                </a>
            </li>
            <li>
                <a href="{{ route('admin.categories.index') }}" class="{{ $_category ?? '' }}">
                    <span class="am-icon-calendar"></span> 商品分类
                </a>
            </li>
            <li>
                <a href="{{ route('admin.themes.index') }}" class="{{ $_theme ?? '' }}">
                    <span class="am-icon-themeisle"></span> 主题管理
                </a>
            </li>
            <li>
                <a href="{{ route('admin.products.index') }}" class="{{ $_product ?? '' }}">
                    <span class="am-icon-product-hunt"></span> 商品管理
                </a>
            </li>
            <li>
                <a href="{{ route('admin.adverts.index') }}" class="{{ $_advert ?? '' }}">
                    <span class="am-icon-google"></span> 广告管理
                </a>
            </li>
            <li>
                <a href="{{ route('admin.notices.index') }}" class="{{ $_notice ?? '' }}">
                    <span class="am-icon-bullhorn"></span> 通知管理
                </a>
            </li>
            <li>
                <a href="{{ route('admin.express.index') }}" class="{{ $_express ?? '' }}">
                    <span class="am-icon-truck"></span> 物流管理
                </a>
            </li>
            <li>
                <a href="{{ route('admin.orders.index') }}" class="{{ $_order ?? '' }}">
                    <span class="am-icon-first-order"></span> 订单管理
                </a>
            </li>
        </ul>
    </div>
</div>
