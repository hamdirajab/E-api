<?php

namespace App\Http\Resources\Prodect;

use Illuminate\Http\Resources\Json\Resource;

class ProdectCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'name' => $this->name,
            'totalPrice' => round((1 - ($this->descount/100) ) * $this->price,2) ,
            'rating' => $this->reviews->count() > 0 ? round($this->reviews->sum('star')/$this->reviews->count(),2) : 'No Rating yet' ,
            'descount' => $this->descount,
            'href' => [
                    
                    'link' => route('prodects.show',$this->id)
                
                ]

        ];
    }
}
