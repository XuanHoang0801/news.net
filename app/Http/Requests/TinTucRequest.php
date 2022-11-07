<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TinTucRequest extends FormRequest
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
            'title' => 'required',
            'noidung' =>'required',
            'theloai' => 'required',
            'loaitin' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'title.required' => 'Vui lòng nhập tiêu đề bài viết!',
            'noidung.required' => 'Vui lòng nhập nội dung bài viết!',
            'theloai.required' => 'Vui lòng chọn thể loại bài viết!',
            'loaitin.required' => 'Vui lòng chọn loại tin bài viết!',

        ];
    }
}
