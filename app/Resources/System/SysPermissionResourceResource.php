<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/2/11
 * Time: 22:27
 */

namespace App\Resources\System;

use App\Resources\BaseResource;

class SysPermissionResource extends BaseResource
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
            'id' => $this->id ?? 0,
        ];
    }
}