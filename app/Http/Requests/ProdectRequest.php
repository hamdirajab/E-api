<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'name' => 'required|max:255|unique:prodects',
            'descrption' => 'required',
            'price' => 'required|max:10',
            'stock' => 'required|max:6',
            'descount' => 'required|max:2',

        ];
    }
}
