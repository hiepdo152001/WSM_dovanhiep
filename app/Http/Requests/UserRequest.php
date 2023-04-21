<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class UserRequest extends FormRequest
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
                
                'department' =>'string|max:255',
                'position'=> 'string|max:255',
                'age'=> 'interger|max:3',
                'location'=> 'string|max:255',
                'project' =>  'string|max:255',
                'sex' => 'string|max:3',
                'permanent_address'=> 'string|max:255',
                'seniority'=> 'string|max:255',
                'contract'=> 'string|max:255', 
                'temporary_address'=>'string|max:255', 
                'CCCD'=>'unique:users|max:255', 
                'issued_by'=>'string|max:255', 
                'personal_email'=> 'string|email|unique:users|max:255',
                'tax_code'=> 'integer|unique:users|max:20',
                // leave_days admin moi hien thi
                'leave_days'=> 'integer|max:2',
                'use_property' => 'string|max:255',
                'avatar'=>'string|max:255',
           

        ];
    }
    
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator){
        
        $errors = $validator->errors();
        $response = new JsonResponse([
            'success' => false,
            'message' => $errors->first(),
            'errors' => $errors
        ], 422);

        throw new HttpResponseException($response);
    }
}
