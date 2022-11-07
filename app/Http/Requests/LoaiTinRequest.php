<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoaiTinRequest extends FormRequest
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
            'name' => 'required|min:3|unique:loaitin,ten_lt',
            'theloai' => 'required'
        ];
    }
    public function messages()
    {
        return[
            'name.required' => 'Vui lòng nhập loại tin!',
            'name.min' => 'Vui lòng loại tin dài hơn 3 ký tự!',
            'name.unique'=> 'Loại tin đã tồn tại!',
            'theloai.required' => 'Bạn chưa chọn thể loại',
        ];
    }
}
