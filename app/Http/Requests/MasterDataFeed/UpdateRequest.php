<?php

namespace App\Http\Requests\MasterDataFeed;

use App\Models\MasterDataFeed;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            MasterDataFeed::URL => 'required|string',
            MasterDataFeed::IS_DOWNLOADED => 'boolean|nullable',
            MasterDataFeed::IS_PARSED => 'boolean|nullable',
            MasterDataFeed::LAST_FEED_ACCESS => 'date|nullable',
        ];
    }
}
