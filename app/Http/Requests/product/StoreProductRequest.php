<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // cấp quyền
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
            'name' => 'required|min:3|unique:products',
            'price' => 'required|numeric',
            'sale_price' => 'required|numeric',
        ];
    }
    // chuyển tiếng việt 
    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống',
            'name.unique' => 'Tên sản phẩm đã tồn tại',
            'name.min' => 'Tên sản phẩm tối thiểu 3 kí tự',
            'price.required' => 'Giá sản phẩm không được để trống',
            'sale_price.required' => 'Giá khuyễn mãi sản phẩm không được để trống',
            'sale_price.numeric' => 'Giá khuyễn mãi sản phẩm phải là số',
            'price.numeric' => 'Giá sản phẩm phải là số',
            
        ];
    }
}
