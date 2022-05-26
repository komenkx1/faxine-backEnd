<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BeritaResource extends JsonResource
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
            'id' => $this->id,
            'judul' => $this->judul,
            'slug' => $this->slug,
            'tanggal_pembuatan' => $this->tanggal_pembuatan,
            'content' => $this->content,
            'cover' => $this->cover,
            'user' => $this->user,
        ];
    }
}
