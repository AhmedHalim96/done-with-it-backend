<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreListingRequest extends FormRequest
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
            "title" => "bail|required|min:5|max:200",
            "price" => "required",
            "description" => "min:5",
            "photos" => "bail|required|array|min:1|max:5",
            "photos.*" => "bail|file|mimes:jpg,jpeg,png|max:2000",
            "category_id" => "required",
        ];
    }
}
