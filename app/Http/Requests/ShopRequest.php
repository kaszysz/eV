<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
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
            'city_id' => 'integer|required',
            'retailer_id' => 'integer|required',
            'street' => 'string|required',
            'fsr_id' => 'integer|nullable',
            'promoter_id' => 'integer|nullable',
            'priority'  => 'string|nullable',
            'geo_latitude'  => 'required|numeric|between:15,70|nullable',
            'geo_longitude'  => 'required|numeric|between:15,70|nullable'
        ];
    }
}
