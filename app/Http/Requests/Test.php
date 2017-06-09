<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class Test extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //做一些权限认证,采购单只能由当前采购员自己审核
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
            'name' => 'required',
            'photo' => 'required',
        ];
    }

    //钩子
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $validator->errors()->add('field', 'Something is wrong with this field!');
        });
    }


    protected function formatError(Validator $validator)
    {
        return $validator->errors()->all();
    }

    public function messages()
    {
        return [
            'name.required' => '姓名不能为空',
            'photo.required'  => '照片不能为空',
        ];
    }
}
