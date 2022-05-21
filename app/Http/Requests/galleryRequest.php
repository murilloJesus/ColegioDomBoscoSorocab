<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class galleryRequest extends FormRequest
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
            'file' => 'required|max:1024000'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'file.required' => 'É nescessario incluir o arquivo .zip ou .rar',
            'file.max' => 'O arquivo não pode ser maior que 1000MB, particione ele se nescessário.',
        ];
    }
}
