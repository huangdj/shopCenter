@extends('layouts.admin.app')

@section('css')
    <link rel="stylesheet" href="/vendor/markdown/css/editormd.min.css"/>
    <link rel="stylesheet" href="/vendor/webupload/dist/webuploader.css"/>
    <link rel="stylesheet" type="text/css" href="/vendor/webupload/style.css"/>
@endsection

@section('content')
    <div class="admin-content-body">
        <div class="page-header">
            <ol class="am-breadcrumb am-breadcrumb-slash">
                <li><a href="{{ route('admin.products.index') }}">首页</a></li>
                <li>新增商品</li>
            </ol>
        </div>

        <div class="page-body">

            @include('layouts.admin.shared._flash')

            <form class="am-form am-form-horizontal" action="{{ route('admin.products.store') }}" method="post">
                @csrf
                <div class="am-tabs am-margin" data-am-tabs>
                    <ul class="am-tabs-nav am-nav am-nav-tabs">
                        <li class="am-active"><a href="#tab1">通用信息</a></li>
                        <li><a href="#tab2">商品介绍</a></li>
                        <li><a href="#tab3">商品相册</a></li>
                        <li><a href="#tab4">商品参数</a></li>
                    </ul>
                    <div class="am-tabs-bd">
                        <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                            <div class="am-form-group">
                                <label for="name" class="am-u-sm-12 am-u-md-3 am-form-label">所属类别</label>
                                <div class="am-u-sm-12 am-u-md-5 am-u-end">
                                    <select multiple
                                            data-am-selected="{btnWidth: '100%', btnSize: 'sm', maxHeight: 360, searchBox: 1}"
                                            name="category_id[]">
                                        @foreach ($categories as $category)
                                            <optgroup label="{{$category->name}}">
                                                @foreach ($category->children as $c)
                                                    <option value="{{$c->id}}">
                                                        {{$c->name}}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="name" class="am-u-sm-12 am-u-md-3 am-form-label">商品名称</label>
                                <div class="am-u-sm-12 am-u-md-5 am-u-end">
                                    <input type="text" name="name" placeholder="输入商品名称">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="name" class="am-u-sm-12 am-u-md-3 am-form-label">所属品牌</label>
                                <div class="am-u-sm-12 am-u-md-5 am-u-end">
                                    <select
                                        data-am-selected="{btnWidth: '100%', btnSize: 'sm', maxHeight: 360, searchBox: 1}"
                                        name="brand_id">
                                        <option value="">请选择</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{$brand->id}}">
                                                {{$brand->name}}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="name" class="am-u-sm-12 am-u-md-3 am-form-label">选择主题</label>
                                <div class="am-u-sm-12 am-u-md-5 am-u-end">
                                    <select
                                        data-am-selected="{btnWidth: '100%', btnSize: 'sm', maxHeight: 360, searchBox: 1}"
                                        name="theme_id">
                                        <option value="">请选择</option>
                                        @foreach ($themes as $theme)
                                            <option value="{{$theme->id}}">
                                                {{$theme->name}}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="am-g am-margin-top">
                                <div class="am-u-sm-12 am-u-md-3 am-form-label">
                                    缩略图
                                </div>
                                <div class="am-u-sm-12 am-u-md-5 am-u-end">
                                    <div class="am-form-group am-form-file">
                                        <button type="button" class="am-btn am-btn-success am-btn-sm">
                                            <i class="am-icon-cloud-upload" id="loading"></i> 上传缩略图
                                        </button>
                                        <span style="margin-left: 50px;color: #f4645f;">请上传宽高：112 * 113 的图片</span>
                                        <input type="file" id="image_upload">
                                        <input type="hidden" name="image">
                                    </div>

                                    <hr data-am-widget="divider" style=""
                                        class="am-divider am-divider-dashed am-no-layout">

                                    <div>
                                        <img src="" id="img_show" style="max-height: 150px;margin-bottom: 10px;">
                                    </div>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="sort" class="am-u-sm-12 am-u-md-3 am-form-label">商品售价</label>
                                <div class="am-u-sm-12 am-u-md-5 am-u-end">
                                    <input type="text" name="price" placeholder="输入商品售价">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="sort" class="am-u-sm-12 am-u-md-3 am-form-label">商品原价</label>
                                <div class="am-u-sm-12 am-u-md-5 am-u-end">
                                    <input type="text" name="original_price" placeholder="输入商品原价">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="name" class="am-u-sm-12 am-u-md-3 am-form-label">计量单位</label>
                                <div class="am-u-sm-12 am-u-md-5 am-u-end">
                                    <select
                                        data-am-selected="{btnWidth: '100%', btnSize: 'sm', maxHeight: 360, searchBox: 1}"
                                        name="unit">
                                        <option value="">请选择</option>
                                        <option value="1">斤</option>
                                        <option value="2">件</option>
                                        <option value="3">个</option>
                                        <option value="4">条</option>
                                    </select>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="sort" class="am-u-sm-12 am-u-md-3 am-form-label">商品库存</label>
                                <div class="am-u-sm-12 am-u-md-5 am-u-end">
                                    <input type="text" name="stock" placeholder="输入商品库存">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="sort" class="am-u-sm-12 am-u-md-3 am-form-label">有效期至</label>
                                <div class="am-u-sm-12 am-u-md-5 am-u-end">
                                    <input type="text" name="expired_at" placeholder="输入商品有效期">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-12 am-u-md-3 am-form-label">是否上架</label>

                                <div class="am-u-sm-12 am-u-md-5 am-u-end">
                                    <label class="am-radio-inline">
                                        <input type="radio" value="1" name="is_onsale" checked=""> 是
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" value="0" name="is_onsale"> 否
                                    </label>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="description" class="am-u-sm-12 am-u-md-3 am-form-label">商品描述</label>
                                <div class="am-u-sm-12 am-u-md-5 am-u-end">
                                    <textarea rows="5" placeholder="输入商品的描述信息" name="description"></textarea>
                                </div>
                            </div>

                            <div class="am-margin-top">
                                <label class="am-u-sm-12 am-u-md-3 am-form-label">推荐类型</label>
                                <div class="am-u-sm-12 am-u-md-5 am-u-end">

                                    <input type="hidden" name="is_top" value="0">
                                    <input type="hidden" name="is_recommend" value="0">
                                    <input type="hidden" name="is_hot" value="0">
                                    <input type="hidden" name="is_new" value="0">

                                    <div class="am-btn-group" data-am-button>
                                        <label class="am-btn am-btn-default am-btn-sm">
                                            <input type="checkbox" name="is_top" value="1"> 置顶
                                        </label>
                                        <label class="am-btn am-btn-default am-btn-sm">
                                            <input type="checkbox" name="is_recommend" value="1"> 推荐
                                        </label>
                                        <label class="am-btn am-btn-default am-btn-sm">
                                            <input type="checkbox" name="is_hot" value="1"> 热销
                                        </label>
                                        <label class="am-btn am-btn-default am-btn-sm">
                                            <input type="checkbox" name="is_new" value="1"> 新品
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="am-tab-panel am-fade" id="tab2">
                            <div class="am-g am-margin-top-sm">
                                <div class="am-u-sm-12 am-u-md-12">
                                    <div id="markdown">
                                        <textarea rows="10" name="content" style="display:none;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="am-tab-panel am-fade" id="tab3">
                            <div id="uploader">
                                <div class="queueList">
                                    <div id="dndArea" class="placeholder">
                                        <div id="filePicker"></div>
                                        <p>或将照片拖到这里，单次最多可选300张</p>
                                    </div>
                                </div>
                                <div class="statusBar" style="display:none;">
                                    <div class="progress">
                                        <span class="text">0%</span>
                                        <span class="percentage"></span>
                                    </div>
                                    <div class="info"></div>
                                    <div class="btns">
                                        <div id="filePicker2"></div>
                                        <div class="uploadBtn">开始上传</div>
                                    </div>
                                </div>

                                <div id="imgs"></div>
                            </div>
                        </div>

                        <div class="am-tab-panel am-fade" id="tab4">
                            <div>
                                <p>填写示例：</p>
                                <table class="am-table am-table-hover table-main">
                                    <tbody>
                                    <tr>
                                        <td>袖长</td>
                                        <td>七分袖</td>
                                    </tr>
                                    <tr>
                                        <td>销售渠道类型</td>
                                        <td>纯电商</td>
                                    </tr>
                                    <tr>
                                        <td>货号</td>
                                        <td>185234</td>
                                    </tr>
                                    <tr>
                                        <td>品牌</td>
                                        <td>皇宫婚纱</td>
                                    </tr>
                                    <tr>
                                        <td>礼服裙摆</td>
                                        <td>拖尾</td>
                                    </tr>
                                    <tr>
                                        <td>颜色分类</td>
                                        <td>白色</td>
                                    </tr>
                                    <tr>
                                        <td>尺码</td>
                                        <td>X,L,XL,XXL,量身定做</td>
                                    </tr>
                                    <tr>
                                        <td>上市年份</td>
                                        <td>2020年冬季</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="am-form-group">
                                <button type="button" class="am-btn am-btn-primary add_file"><span
                                        class="am-icon-plus"></span>
                                    增加
                                </button>
                                <p style="margin-left: 100px;margin-top: -30px;color: #f4645f">*
                                    注：每次只能添加8条数据</p>
                            </div>
                            <div class="files">
                                <div class="am-form-group">
                                    <div class="am-u-sm-12 am-u-md-3">
                                        <input type="text" class="file1" name="parame_name[]">
                                    </div>
                                    <div class="am-u-sm-12 am-u-md-3">
                                        <input type="text" class="file1" name="parame_value[]">
                                    </div>
                                    <div class="am-u-sm-12 am-u-md-6">
                                        <a href="javascript:;" class="am-icon-close del_one" data-id=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="am-form-group">
                    <div class="am-u-sm-12 am-u-md-9 am-u-md-offset-3">
                        <button type="button" onclick="location.href='/admin/products'"
                                class="am-btn am-btn-default am-btn-sm am-radius">返 回
                        </button>
                        <button type="submit" class="am-btn am-btn-primary am-btn-sm am-radius">保 存</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('js')
    <script src="/vendor/html5-fileupload/jquery.html5-fileupload.js"></script>
    <script src="/js/upload.js"></script>

    <script src="/vendor/markdown/editormd.min.js"></script>
    <script src="/js/editormd_config.js"></script>

    <script type="text/javascript" src="/vendor/webupload/dist/webuploader.js"></script>
    <script type="text/javascript" src="/vendor/webupload/upload.js"></script>
    <script>
        $(function () {
            $(".add_file").click(function () {
                var length = $(".files").children().length;
                if (length >= 8) {
                    alert('最多只能添加8个商品参数~');
                    return false;
                }
                var i = length + 1;
                var html = '<div class="am-form-group">' +
                    '<div class="am-u-sm-12 am-u-md-3">' +
                    '<input type="text" class="file' + i + '" name="parame_name[]">' +
                    '</div>' +
                    '<div class="am-u-sm-12 am-u-md-3">' +
                    '<input type="text" class="file' + i + '" name="parame_value[]">' +
                    '</div>' +
                    '<div class="am-u-sm-12 am-u-md-6">' +
                    '<a href="javascript:;" class="am-icon-close del_one" data-id=""></a>' +
                    '</div>' +
                    '</div>';
                $(".files").append(html);
            })

            //js删除表单
            $(document).on('click', '.del_one', function () {
                $(this).parents('.am-form-group').remove();
            });
        })
    </script>
@stop
