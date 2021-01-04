<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryValidate extends FormRequest
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
                ];
            case 'PUT':
                return [
                    'name' => 'required|unique:categories,name,' . $this->route('categories') . '|max:255',
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
            'name' => '分类名称',
        ];
    }
}
