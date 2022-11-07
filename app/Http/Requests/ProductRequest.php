<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        return [
            'producer'=>'required',
            'name'=>'required|min:3|unique:products,name'
        ];
    }

    public function messages()
    {
        return [
            'producer.required'=>'Vui lòng chọn chuyên mục sản phẩm!',
            'name.required'=>'Vui lòng nhập tên sản phẩm!',
            'name.min'=>'Tên sản phẩm quá ngắn!',
            'name.unique'=>'Tên sản phẩm đã tồn tại!'
        ];
    }
}
