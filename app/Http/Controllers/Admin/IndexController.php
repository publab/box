<?php
/**
 * Created by PhpStorm.
 * User: 89340
 * Date: 2019/11/12
 * Time: 16:46
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * @return string
     * index
     */
    public function index(){
//        User::create([
//            'mobile' => '18731133002',
//            'email' => '1250101915@qq.com',
//            'password' => \Hash::make('12345678')
//        ]);
        return 'admin';
    }

    /**
     * 文章列表
     */
    public function list(Request $request){

        return DB::table('sys_permissions_need2')->paginate(10);
    }

    /**
     * 详情
     */
    public function detail(Request $request,$id = 0){

        return $this->success('success',DB::table('sys_permissions_need2')->where('id',$id)->first());
    }

    /**
     * 添加
     */
    public function create(Request $request){

        $data = $request->data ?? [];

        $rules = [
            'name' => ['required'],
            'display_name' => ['required'],
        ];
        $message = [
            'name.required' => '请填写name',
            'display_name.required' => '请填display_name',
        ];

        $validator = validator($data, $rules, $message);

        if ($validator->fails()) {
            return $this->error($validator->errors()->first());
        }

        DB::table('sys_permissions_need2')->insert([
            'name' => $data['name'],
            'display_name' => $data['display_name'],
        ]);

        return $this->success('操作成功');
    }

    /**
     * 修改
     */
    public function update(Request $request,$id = 0)
    {
        $data = $request->data ?? [];

        $rules = [
            'name' => ['required'],
            'display_name' => ['required'],
        ];
        $message = [
            'name.required' => '请填写name',
            'display_name.required' => '请填display_name',
        ];

        $validator = validator($data, $rules, $message);

        if ($validator->fails()) {
            return $this->error($validator->errors()->first());
        }

        DB::table('sys_permissions_need2')->where('id',$id)->update([
            'name' => $data['name'],
            'display_name' => $data['display_name'],
        ]);

        return $this->success('操作成功');
    }

    /**
     * 发送邮件实例
     */
    public function mail(){
        $message = '。。  对对对 我说得对';
        $to = '1250101915@qq.com';
        $subject = '夸夸你';
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
     * 获取token
     */
    public function token(Request $request){

        $data = $request->data ?? [];

        $rules = [
            'mobile' => ['required'],
            'password' => ['required'],
        ];
        $message = [
            'mobile.required' => '请填写登录账号',
            'password.required' => '请填写密码',
        ];

        $validator = validator($data, $rules, $message);

        if ($validator->fails()) {
            return $this->error($validator->errors()->first());
        }


        $user = User::where([
            'mobile' => $data['mobile'],
        ])->first();

        if(!$user || $data['password'] != '12345678'){
            return $this->error('账号密码错误');
        }

        $token = auth('admin')->login($user);

        return $this->success('success',[
            'token' => $token
        ]);
    }

    /**
     * 用户信息
     */
    public function userinfo(){
        $user = \Auth::user();

        return $this->success('success',[
            'mobile' => $user->mobile ?? '',
            'email' => $user->email ?? '',
        ]);
    }

    /**
     * 获取分类
     */
    public function category(){
        $list = DB::table('sys_permissions_need')->get();
        return $this->success('success',$this->merge($list));
    }

    public function merge($list,$parent_id = 0){

        $need = [];

        foreach ($list as $val){
            if($val->parent_id == $parent_id){
                $val->child = $this->merge($list,$val->id);
                $need[] = $val;
            }
        }
        return $need;
    }
}
