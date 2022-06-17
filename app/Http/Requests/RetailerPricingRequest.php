<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RetailerPricingRequest extends FormRequest
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
            'retailer_id' => ['integer', 'required'],
            'retailer_index' => ['string', 'required'],
            'product_id' => ['integer', 'required'],
            'price' => ['numeric', 'required'],
            'sale' => ['numeric', 'nullable'],
            'bonus' => ['string', 'nullable'],
            'bonus_value' => ['string', 'nullable']
        ];
    }
}
