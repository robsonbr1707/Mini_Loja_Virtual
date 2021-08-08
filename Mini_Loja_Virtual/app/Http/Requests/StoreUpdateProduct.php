<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoreUpdateProduct extends FormRequest
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
            'name_product'=> ['required'],
            'description'=> ['required','max:500'],
            'price'=> ['required','max:6'],
            'image'=> ['required','image']
        ];
    }

    public function messages()
    {
        return [
            'name_product.required'=> 'Campo Não Preenchido',
            'description.required'=> 'Campo Não Preenchido',
            'description.max'=> 'Máximo De 500 Digitos',
            'price.required'=> 'Campo Não Preenchido',
            'price.max'=> 'Máximo De 6 Digitos',
            'image.required'=> 'Campo Não Preenchido'

        ];
    }

}