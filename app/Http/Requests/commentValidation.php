<?php


namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class commentValidation extends FormRequest {
    
    
  public function authorize() {
        return true;
    }
    
 public function rules() {
        return [
            'desc' => 'required|string|max:150',
        ];
    }

    public function messages() {
        return [
            'desc.required' => 'Description is required! Cannot be blank before submit',
        ];
    
    
    }
   
    
}