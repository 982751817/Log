<?php


namespace App\Http\Validate;

use Illuminate\Support\Facades\Validator;

class LogValidate
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function rules()
    {
        return [
            'userName' => 'required|string|between:4,20',
//            'url' => 'required|max:20',
//            'ip' => 'ip|required',
//            'method' => 'required|in:GET,POST,PUT,DELETE',
//            'statusCode' => 'required|integer|max:1000'
        ];
    }

    public function message()
    {
        return [
            'userName.required' => '用户昵称不能为空',
            'userName.string' => '用户名称仅支持字符串',
            'userName.between' => '用户名字长度必须介于2-32之间',
        ];
    }

    public function goCheck(){
        $validate = Validator::make($this->data,$this->rules(),$this->message());
        if($validate->fails()){
          $error = $validate->errors();

        }
    }
}
