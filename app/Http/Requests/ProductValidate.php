<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductValidate extends FormRequest
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
                    'price' => 'required|numeric',
                    'original_price' => 'numeric',
                    'unit' => 'required',
                    'stock' => 'required|numeric',
                    'expired_at' => 'date',
                    'content' => 'required',
                ];
            case 'PUT':
                return [
                    'name' => 'required|unique:products,name,' . $this->route('products') . '|max:255',
                    'price' => 'required|numeric',
                    'original_price' => 'numeric',
                    'unit' => 'required',
                    'stock' => 'required|numeric',
                    'expired_at' => 'required|date',
                    'content' => 'required',
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
            'name' => '商品名称',
            'price' => '商品单价',
            'original_price' => '商品原价',
            'unit' => '商品单位',
            'stock' => '商品库存',
            'expired_at' => '有效期',
            'content' => '商品详情',
        ];
    }
}
