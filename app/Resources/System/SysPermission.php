<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/2/11
 * Time: 22:27
 */

namespace App\Resources\System;

use App\Resources\Base;

class SysPermission extends Base
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'key'            => $this->id,
            'guard_name'    => $this->guard_name,
            'name'          => $this->name,
            'display_name'  => $this->display_name,
            'parent_id'     => $this->parent_id,
            'icon'          => $this->icon,
            'is_menu'       => $this->is_menu,
            'is_work'       => $this->is_work,
            'sorts'         => $this->sorts,
            'level'         => $this->when($this->level, $this->level),
        ];
    }
}