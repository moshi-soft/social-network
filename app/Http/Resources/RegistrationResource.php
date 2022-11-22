<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RegistrationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
//            'token_type' => 'Bearer',
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
//            'token' => $this['token'],
        ];
    }
}
