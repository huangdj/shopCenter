<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandValidate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'name' => 'required|max:255',
                    'image' => 'required',
                ];
            case 'PUT':
                return [
                    'name' => 'required|unique:brands,name,' . $this->route('brands') . '|max:255',
                    'image' => 'required',
                ];
        }
    }

    /***
     * 定义字段名称
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => '品牌名称',
            'image' => '缩略图',
        ];
    }
}
