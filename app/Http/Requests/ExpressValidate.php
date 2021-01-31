<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpressValidate extends FormRequest
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
                    'code' => 'required',
                    'url' => 'required',
                    'shipping_money' => 'required|numeric',
                    'shipping_free' => 'required|numeric',
                ];
            case 'PUT':
                return [
                    'name' => 'required|unique:expresses,name,' . $this->route('expresses') . '|max:255',
                    'code' => 'required',
                    'url' => 'required',
                    'shipping_money' => 'required|numeric',
                    'shipping_free' => 'required|numeric',
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
            'name' => '物流名称',
            'code' => '物流公司代码',
            'url' => '公司网址',
            'shipping_money' => '运费',
            'shipping_free' => '满额包邮',
        ];
    }
}
