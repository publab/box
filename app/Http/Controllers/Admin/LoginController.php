<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/11/30
 * Time: 12:08
 */

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends InitController
{

    /**
     * 获取token
     */
    public function token(Request $request){

        $data = $request->data ?? [];

        $rules = [
            'mobile' => ['required'],
            'password' => ['required'],
        ];
        $message = [
            'mobile.required' => '请填写手机号',
            'password.required' => '请填密码',
        ];

        $validator = validator($data, $rules, $message);

        if ($validator->fails()) {
            return $this->error($validator->errors()->first());
        }

        $user = User::where('mobile',$data['mobile'])->first();

        if(!$user){
            return $this->error('当前手机号未注册');
        }

        if(!\Hash::check($data['password'],$user->password)){
            return $this->error('密码错误');
        }
        $token = auth('admin')->login($user);

        return $this->success('success',[
            'token' => $token
        ]);
    }

    /**
     * 刷新token
     */
    public function refresh(){
        return $this->success('success',[
            'token' => auth('admin')->refresh()
        ]);
    }

    /**
     * @return mixed
     * 退出登录
     */
    public function logout()
    {
        auth('admin')->logout();
        return $this->success('success');
    }

}