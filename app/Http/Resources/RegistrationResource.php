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
        //return parent::toArray($request);
       // dd($request->all());
//        print_r($this);
//        die;
        //dd($this);
        return [
            'token_type' => 'Bearer',
            'name' => $request->name,
            'email' => $request->email,
            'token' => $this['token'],
        ];
    }
}
