<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/2/16
 * Time: 10:04
 */

namespace App\Http\Controllers\Admin\System\Develop;

use App\Http\Controllers\Admin\InitController;
use App\Models\System\SysRole;
use App\Resources\System\SysRoleCollection;
use Illuminate\Http\Request;

class RoleController extends InitController
{
    public function index(Request $request)
    {
        $roles = SysRole::where([
            'guard_name' => config('auth.defaults.guard'),
        ])->orderBy('id','asc')->paginate();

        return new SysRoleCollection($roles);
    }
}