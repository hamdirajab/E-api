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
        'stock' => $this->stock == 0 ? 'Out of Stock' : $this->stock,
        'descount' => $this->descount,
        'totalPrice' => round((1 - ($this->descount/100) ) * $this->price,2) ,
        'rating' => $this->reviews->count() > 0 ? round($this->reviews->sum('star')/$this->reviews->count(),2) : 'No Rating yet' ,
        'href' => [
            'reviews' => route('reviews.index',$this->id)
        ]


       ];
    }
}
