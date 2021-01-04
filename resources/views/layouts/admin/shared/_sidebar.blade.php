<div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
        <ul class="am-list admin-sidebar-list">
            <li>
                <a href="/admin" class="{{ $_admin ?? '' }}">
                    <span class="am-icon-dashboard"></span> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.categories.index') }}" class="{{ $_category ?? '' }}">
                    <span class="am-icon-calendar"></span> 商品分类
                </a>
            </li>
            <li>
                <a href="admin-form.html">
                    <span class="am-icon-pencil-square-o"></span> 表单
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="am-icon-sign-out"></span> 注销
                </a>
            </li>
        </ul>
    </div>
</div>
