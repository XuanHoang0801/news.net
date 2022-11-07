<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeRequest extends FormRequest
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
            'password'=>'required',
            're_pass'=> 'required|same:password'
        ];
    }
    public function messages()
    {
        return[
            'password.required'=>'Vui lòng nhập mật khẩu!',
            're_pass.required'=> 'Vui lòng nhập xác thực mật khẩu!',
            're_pass.same'=>'Mật khẩu không trùng khớp'
        ];
    }
}
