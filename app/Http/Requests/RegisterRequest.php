<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class RegisterRequest extends FormRequest
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
                'name' => 'string|max:255',
                'email' => 'required|string|email|unique:users|max:255',
                'password' => 'required|string|min:8',
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
