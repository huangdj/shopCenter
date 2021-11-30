<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /***
     * 上传图片
     * @param Request $request
     */
    public function store(Request $request)
    {
        if ($request->hasFile('file') && $request->file('file')->isValid()) {

//            $allow_types = ['image/png', 'image/jpeg', 'image/gif'];
//            if (!in_array($request->image->getMimeType(), $allow_types)) {
//                return ['success' => false, 'msg' => '图片类型不正确！'];
//            }
//
//            if ($request->image->getSize() > 1024 * 1024 * 3) {
//                return ['success' => false, 'msg' => '图片大小不能超过 3M！'];
//            }

            $path = $request->file->store('public/images');
            // 上传到七牛
            $file_path = storage_path('app/') . $path;
            qiniu_upload($file_path);

            return ['success' => true, 'image_url' => 'https://image.holyzq.com/' . basename($file_path)];
        }
    }
}
