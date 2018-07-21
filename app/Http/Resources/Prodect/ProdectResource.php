<?php

namespace App\Http\Resources\Prodect;

use Illuminate\Http\Resources\Json\JsonResource;

class ProdectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       return[

        'name' => $this->name,
        'descrption' => $this->details,
        'price' => $this->price,
        'stock' => $this->stock,
        'descount' => $this->descount


       ];
    }
}
