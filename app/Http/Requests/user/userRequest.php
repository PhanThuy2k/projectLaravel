<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
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
            'name' => 'required|min:3|unique:user',
            'email' => 'required|email',
            'password' => 'required',
            'confirmPassword' => 'required|same:password'
        ];
    }
    public function messages()
    { 
        return [
            'name.required' => 'Tên người dùng không được để trống',
            'name.unique' => 'Tên người dùng đã tồn tại',
            'name.min' => 'Tên người dùng tối thiểu 3 kí tự',
            'email.required' => 'email không được để trống ',
            'email.email' => 'email không không đúng định dạng ',
            'password.required' => 'mật khẩu không được để trống',
            'confirmPassword.required' => 'mật khẩu không được để trống',
            'confirmPassword.same:password' => 'mật khẩu không giống nhau',
        ];
    }
}
