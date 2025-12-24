<?php

namespace App\Customer\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'corporate_name' => $this->corporate_name,
            'document' => $this->document,
            'email' => $this->email,
            'phone' => $this->phone,

            'address_info' => [
                'address' => $this->address,
                'zip_code' => $this->zip_code,
            ],

            'logo_url' => $this->logo ? Storage::url($this->logo) : null,
        ];
    }
}
