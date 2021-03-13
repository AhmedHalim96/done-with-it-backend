<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateListingRequest extends FormRequest
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
            "title" => "bail|min:5|max:200",
            "price" => "numeric",
            "description" => "min:5",
            "photo" => "bail|array|min:1|max:5",
            "photos.*" => "bail|file|mimes:jpg,jpeg,png|max:2000",
            "deleted_photos" => "bail|array|min:1",
            "deleted_photos.*" => "numeric",
            "category_id" => "numeric",
        ];
    }
}
