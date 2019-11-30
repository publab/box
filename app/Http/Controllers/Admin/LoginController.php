<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/11/30
 * Time: 12:08
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class LoginController extends Controller
{

    /**
     * 获取token
     */
    public function token(){
        $user = User::find(1);
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

}