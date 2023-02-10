<?php

namespace App\Http\Requests\password;

use Illuminate\Foundation\Http\FormRequest;

class passwordRequest extends FormRequest
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
            'passwordNew'=>'required',
            'RepasswordNew'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'password.required' => 'mật khẩu không được để trống',
            'passwordNew.required' => 'mật khẩu không được để trống',
            'RepasswordNew.required' => 'mật khẩu không được để trống',
        ];
    }
}
