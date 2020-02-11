<?php

namespace App\Resources;

class UserResource extends BaseResource
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
            'mobile' => $this->mobile,
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => (string)$this->created_at,
        ];
    }
}
