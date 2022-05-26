<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LokasiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'alamat' => $this->alamat,
            'status' => $this->status,
            'link_google_map' => $this->link_google_map,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_berakhir' => $this->tanggal_berakhir,
            'kapasitas' => $this->kapasitas,
        ];
    }
}
