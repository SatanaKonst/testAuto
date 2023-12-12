<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use LVR\Colour\Hex;

class CarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'mark_id' => 'required|integer',
            'model_id' => 'required|integer',
            'year' => 'date|nullable',
            'color' => array(new Hex, 'nullable'),
            'mileage' => 'integer|nullable'
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
