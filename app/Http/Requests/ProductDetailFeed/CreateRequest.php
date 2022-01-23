<?php

namespace App\Http\Requests\ProductDetailFeed;

use App\Models\ProductDetailFeed;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            ProductDetailFeed::FEED_ID => 'nullable|string|max:250',
            ProductDetailFeed::FORHANDLER => 'nullable|string|max:250',
            ProductDetailFeed::KATEGORINAVN => 'nullable|string|max:250',
            ProductDetailFeed::BRAND => 'nullable|string|max:250',
            ProductDetailFeed::PRODUKTNAVN => 'nullable|string|max:250',
            ProductDetailFeed::PRODUKTID => 'nullable|string|max:250',
            ProductDetailFeed::EAN => 'nullable|string|max:250',
            ProductDetailFeed::BESKRIVELSE => 'nullable|string|max:250',
            ProductDetailFeed::NYPRIS => 'nullable|numeric|between:0.00,9999999.99',
            ProductDetailFeed::GLPRIS => 'nullable|numeric|between:0.00,9999999.99',
            ProductDetailFeed::FRAGTOMK => 'nullable|numeric|between:0.00,9999999.99',
            ProductDetailFeed::LAGERANTAL => 'nullable|string|max:250',
            ProductDetailFeed::LEVERINGSTID => 'nullable|string|max:250',
            ProductDetailFeed::BILLEDURL => 'nullable|string|max:250',
            ProductDetailFeed::VAREURL => 'nullable|string|max:250',
        ];
    }
}
