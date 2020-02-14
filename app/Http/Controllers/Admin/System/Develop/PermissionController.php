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
use App\Resources\System\SysPermissionCollection;
use Illuminate\Http\Request;

class PermissionController extends InitController
{
    /**
     * @param Request $request
     * 获取权限列表
     */
    public function index(Request $request)
    {
        $permission = SysPermission::getPermissions(['guard_name' => config('auth.defaults.guard')])->buildTree()->mergeTree();
        return new SysPermissionCollection($permission);
    }

    /**
     * @param Request $request
     * 创建权限
     */
    public function create(Request $request){

        $data = $request->data ?? [];

        $validator = validator($data, [
            'display_name' => ['required'],
            'name' => ['required','unique:sys_permissions'],
        ], [
            'display_name.required' => '请填写显示名称',
            'name.required' => '请填权限名称',
            'name.unique' => '权限名称已存在',
        ]);

        if ($validator->fails()) {
            return $this->error($validator->errors()->first());
        }

        SysPermission::create($data);

        return $this->success('success');
    }
}