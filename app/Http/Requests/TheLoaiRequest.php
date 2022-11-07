<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TheLoaiRequest extends FormRequest
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
            //
            'name'=> 'required|min:3'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => "Vui lòng nhập thể loại!",
            'name.min' => "Vui lòng nhập nhiều hơn 3 ký tự!",
            // 'name.unique' => "Thể loại đã tồn tại!"
        ];
    }
}
