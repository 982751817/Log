<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogSubmitFormRequest extends FormRequest
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
            'userName' => 'required|string|between:4,20',
            'url' => 'required|max:20',
            'ip' => 'ip|required',
            'method' =>'required|in:GET,POST,PUT,DELETE',
            'statusCode'=>'required|integer|max:1000'
        ];
    }

    public function messages()
    {
        return [
            'userName.required' => '用户昵称不能为空',
            'userName.string' => '用户名称仅支持字符串',
            'userName.between' => '用户名字长度必须介于2-32之间',
        ];
    }
}
