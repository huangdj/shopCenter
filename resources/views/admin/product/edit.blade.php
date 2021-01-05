@extends('layouts.admin.app')

@section('css')
    <link rel="stylesheet" href="/vendor/markdown/css/editormd.min.css" />
    <link rel="stylesheet" href="/vendor/webupload/dist/webuploader.css" />
    <link rel="stylesheet" type="text/css" href="/vendor/webupload/style.css" />
@endsection

@section('content')
    <div class="admin-content-body">
        <div class="page-header">
            <ol class="am-breadcrumb am-breadcrumb-slash">
                <li><a href="{{ route('admin.products.index') }}">首页</a></li>
                <li>编辑商品</li>
            </ol>
        </div>

        <div class="page-body">

            @include('layouts.admin.shared._flash')

            <form class="am-form am-form-horizontal" action="{{ route('admin.products.update', $product->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="am-tabs am-margin" data-am-tabs>
                    <ul class="am-tabs-nav am-nav am-nav-tabs">
                        <li class="am-active"><a href="#tab1">通用信息</a></li>
                        <li><a href="#tab2">商品介绍</a></li>
                        <li><a href="#tab3">商品相册</a></li>
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
                                                    <option value="{{$c->id}}" @if($p_categories->contains($c->id)) selected @endif>
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
                                    <input type="text" name="name" value="{{ $product->name }}">
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
                                        <input type="hidden" name="image" value="{{ $product->image }}">
                                    </div>

                                    <hr data-am-widget="divider" style="" class="am-divider am-divider-dashed am-no-layout">

                                    <div>
                                        <img src="{{ $product->image }}" id="img_show" style="max-height: 150px;margin-bottom: 10px;">
                                    </div>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="sort" class="am-u-sm-12 am-u-md-3 am-form-label">商品售价</label>
                                <div class="am-u-sm-12 am-u-md-5 am-u-end">
                                    <input type="text" name="price" value="{{ $product->price }}">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="sort" class="am-u-sm-12 am-u-md-3 am-form-label">商品原价</label>
                                <div class="am-u-sm-12 am-u-md-5 am-u-end">
                                    <input type="text" name="original_price" value="{{ $product->original_price }}">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="name" class="am-u-sm-12 am-u-md-3 am-form-label">计量单位</label>
                                <div class="am-u-sm-12 am-u-md-5 am-u-end">
                                    <select
                                        data-am-selected="{btnWidth: '100%', btnSize: 'sm', maxHeight: 360, searchBox: 1}"
                                        name="unit">
                                        <option value="1" @if($product->unit == 1) selected @endif>斤</option>
                                        <option value="2" @if($product->unit == 2) selected @endif>件</option>
                                        <option value="3" @if($product->unit == 3) selected @endif>个</option>
                                    </select>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="sort" class="am-u-sm-12 am-u-md-3 am-form-label">商品库存</label>
                                <div class="am-u-sm-12 am-u-md-5 am-u-end">
                                    <input type="text" name="stock" value="{{ $product->stock }}">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="sort" class="am-u-sm-12 am-u-md-3 am-form-label">有效期至</label>
                                <div class="am-u-sm-12 am-u-md-5 am-u-end">
                                    <input type="text" name="expired_at" value="{{ $product->expired_at }}">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-12 am-u-md-3 am-form-label">是否上架</label>

                                <div class="am-u-sm-12 am-u-md-5 am-u-end">
                                    <label class="am-radio-inline">
                                        <input type="radio" value="1" name="is_onsale" @if($product->is_onsale == 1) checked @endif> 是
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" value="0" name="is_onsale" @if($product->is_onsale == 0) checked @endif> 否
                                    </label>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="description" class="am-u-sm-12 am-u-md-3 am-form-label">商品描述</label>
                                <div class="am-u-sm-12 am-u-md-5 am-u-end">
                                    <textarea rows="5" name="description">{{ $product->description }}</textarea>
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
                                            <input type="checkbox" name="is_top" value="1" @if($product->is_top == 1) checked @endif> 置顶
                                        </label>
                                        <label class="am-btn am-btn-default am-btn-sm">
                                            <input type="checkbox" name="is_recommend" value="1" @if($product->is_recommend == 1) checked @endif> 推荐
                                        </label>
                                        <label class="am-btn am-btn-default am-btn-sm">
                                            <input type="checkbox" name="is_hot" value="1" @if($product->is_hot == 1) checked @endif> 热销
                                        </label>
                                        <label class="am-btn am-btn-default am-btn-sm">
                                            <input type="checkbox" name="is_new" value="1" @if($product->is_new == 1) checked @endif> 新品
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="am-tab-panel am-fade" id="tab2">
                            <div class="am-g am-margin-top-sm">
                                <div class="am-u-sm-12 am-u-md-12">
                                    <div id="markdown">
                                        <textarea rows="10" name="content" style="display:none;">{!! $product->content !!}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="am-tab-panel am-fade" id="tab3">

                            <ul data-am-widget="gallery"
                                class="am-gallery am-avg-sm-2 am-avg-md-4 am-avg-lg-6 am-gallery-imgbordered xGallery"
                                data-am-gallery="{ pureview: true }">

                                @foreach($product->product_galleries as $gallery)
                                    <li>
                                        <div class="am-gallery-item">
                                            <a href="{{$gallery->img}}" class="">
                                                <img src="{{$gallery->img}}"/>
                                            </a>
                                            <div class="file-panel">
                                                <span class="cancel" data-id="{{$gallery->id}}">删除</span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

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
                    </div>
                </div>

                <div class="am-form-group">
                    <div class="am-u-sm-12 am-u-md-9 am-u-md-offset-3">
                        <button type="button" onclick="location.href='/admin/products'" class="am-btn am-btn-default am-btn-sm am-radius">返 回</button>
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
@stop
