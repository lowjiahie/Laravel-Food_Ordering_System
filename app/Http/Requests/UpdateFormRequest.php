<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFormRequest extends FormRequest
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
            'foodName' => 'required|max:255',
            'foodDescription' => 'required',
            'category' => 'required',
            'placingNumberInSales' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'foodName.required' => 'Food name cannot be blank value and must be unique',
            'foodDescription.required' => 'Food description cannot be blank value',
            'category.required' => 'Food category cannot be blank value',
            'placingNumberInSales.required' => 'Food price cannot be blank value',
            'price.required' => 'Food price cannot be blank value',
            'quantity.required' => 'Food quantity cannot be blank value',
        ];
    }
}
