@extends('layouts.admin.app')

@section('content')
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="page-header">
                <ol class="am-breadcrumb am-breadcrumb-slash">
                    <li><a href="/admin">首页</a></li>
                    <li>微信菜单</li>
                </ol>
            </div>

            <div class="page-body">
                <div class="am-g">
                    <div class="am-u-sm-12">
                        <div class="am-btn-toolbar">
                            <button type="button" onclick="location.href='/admin/wechat/destroy'" class="am-btn am-btn-danger" id="destroy_checked"
                                    data-method="delete"
                                    data-token="{{csrf_token()}}" data-confirm="确认删除菜单吗?此操作不可恢复!">
                                <span class="am-icon-trash-o"></span> 删除菜单
                            </button>
                        </div>
                    </div>
                </div>

                <div class="am-g">
                    <div class="am-u-sm-12 am-u-md-12">
                        <div class="am-tab-panel">
                            <form class="am-form" action="/admin/wechat/update" method="post">
                                @csrf
                                @method('PUT')
                                <div class="am-tabs" data-am-tabs>
                                    <ul class="am-tabs-nav am-nav am-nav-tabs">
                                        <li class="am-active"><a href="#tab0">菜单一</a></li>
                                        <li><a href="#tab1">菜单二</a></li>
                                        <li><a href="#tab2">菜单三</a></li>
                                    </ul>

                                    <div class="am-tabs-bd">
                                        @for ($i = 0; $i < 3; $i++)
                                            <?php
                                            $button = isset($buttons["$i"]) ? $buttons["$i"] : "";
                                            ?>
                                            @include('admin.wechat._form', ['button' => $button, 'index'=>$i])
                                        @endfor
                                    </div>
                                </div>

                                <div class="am-margin">
                                    <button type="submit" class="am-btn am-btn-primary">保存修改</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
