<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_number' => ['string','nullable'],
            'category_id' => ['integer','required'],
            'producer_id' => ['integer','required'],
            'name' => ['string','required'],
            'size_id' => ['integer','nullable'],
            'matrix_id' => ['integer','nullable'],
            'resolution_id' => ['integer','nullable'],
            'refresh_rate_id' => ['integer','nullable'],
            'processor_id' => ['integer','nullable'],
            'ram_id' => ['integer','nullable'],
            'disc_id' => ['integer','nullable'],
            'graphic_card_id' => ['integer','nullable'],
            'os_id' => ['string','nullable'],
        ];
    }
}
