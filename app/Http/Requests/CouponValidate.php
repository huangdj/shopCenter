<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponValidate extends FormRequest
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
                    'value' => 'required|numeric',
                    'total' => 'required|numeric|min:0',
                    'min_amount' => 'required|numeric|min:0',
                    'description' => 'required'
                ];
            case 'PUT':
                return [
                    'name' => 'required|max:255',
                    'value' => 'required',
                    'total' => 'required|numeric|min:0',
                    'min_amount' => 'required|numeric|min:0',
                    'description' => 'required'
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
            'name' => '优惠券名称',
            'value' => '优惠券面值',
            'total' => '总数',
            'min_amount' => '最低下单金额',
            'description' => '使用说明'
        ];
    }
}
