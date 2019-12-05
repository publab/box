<?php
/**
 * Created by PhpStorm.
 * User: 89340
 * Date: 2019/11/12
 * Time: 16:46
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Resources\User as UserResource;

class IndexController extends Controller
{
    /**
     * @return string
     * index
     */
    public function index(){
        return 'admin';
    }

    /**
     * 发送邮件实例
     */
    public function mail(){
        $message = 'test';
        $to = '1152632628@qq.com';
        $subject = '邮件名称';
        Mail::send(
            'emails.test',
            ['content' => $message],
            function ($message) use($to, $subject) {
                $message->to($to)->subject($subject);
//                $attachment = storage_path('exports/test/xls');
//                $message->attach($attachment,['as' => 'test.xls']);
            }
        );
    }

    /**
     * 用户信息
     */
    public function userinfo(){
        $user = \Auth::user();

//        $res = Permission::create(['name' => 'edit.articles5']);

        return new UserResource($user);
    }
}
