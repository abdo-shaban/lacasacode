<?php

namespace App\Http\Resources;

use App\Http\Resources\Products\LookupsProductTypeResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request): array
    {
        /**
         * @var $this User|JsonResource;
         */

        return [
            "id"           => $this->id,
            "first_name"   => $this->first_name,
            "last_name"    => $this->last_name,
            "country_code" => $this->country_code,
            "phone_number" => $this->phone_number,
            "gender"       => $this->gender,
            "birthdate"    => $this->birthdate,

            "statuses" => UserStatusResource::collection($this->whenLoaded('statuses')),

        ];
    }
}
