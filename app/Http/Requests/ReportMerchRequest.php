<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportMerchRequest extends FormRequest
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
            'shop_id' => ['integer', 'required'],
            'user_id' => ['integer', 'required'],
            'geo_latitude' => ['numeric', 'nullable'],
            'geo_longitude' => ['numeric', 'nullable'],
            'retailer_pricings' => ['array', 'min:1']
        ];
    }
}
