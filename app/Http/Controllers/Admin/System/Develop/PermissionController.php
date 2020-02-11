<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/12/11
 * Time: 22:29
 */

namespace App\Http\Controllers\Admin\System\Develop;

use App\Http\Controllers\Admin\InitController;
use App\Models\System\SysPermission;
use Illuminate\Http\Request;

class PermissionController extends InitController
{
    /**
     * @param Request $request
     * 获取权限列表
     */
    public function index(Request $request)
    {
        $permission = SysPermission::getPermissions();
        return $this->success('这里是列表',$permission);
    }

    /**
     * @param Request $request
     * 创建权限
     */
    public function create(Request $request){
        SysPermission::create([
            'name' => 'duanzhiwei',
            'href' => 'duanzhiwei',
        ]);

        return $this->success('success');
    }
}