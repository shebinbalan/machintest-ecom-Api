<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'product_code'=>[
                'required',
                'string'
            ],
            'name'=>[
                'required',
                'string'
            ],
            'slug'=>[
                'required',
                'string',
                'max:255'
            ],
            'brand'=>[
                'required',
                'string',
                'max:255'
            ],
            'description'=>[
                'required',
                'string',
                'max:255'
            ],
            'original_price'=>[
                'required',
                'integer',
                
            ],
            'selling_price'=>[
                'required',
                'integer',
                
            ],
            'quantity'=>[
                'required',
                'integer',
                
            ],
            'status'=>[
                'nullable',
                
                
            ],
            'image' => ['nullable',
                
            ],
        ];
    }
}
