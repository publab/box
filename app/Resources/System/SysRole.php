<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/2/16
 * Time: 10:17
 */

namespace App\Resources\System;

use App\Resources\Base;

class SysRole extends Base
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
            'key'           => $this->id,
            'name'          => $this->name,
            'guard_name'    => $this->guard_name,
            'display_name'  => $this->display_name,
            'is_work'       => $this->is_work,
        ];
    }
}