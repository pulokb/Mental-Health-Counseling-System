<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Language;

class LanguageCreateRequest extends FormRequest
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
        // return Language::$rules;
        $rules =  Language::$rules;
        $rules = array_merge($rules, [
            'code' => 'required|string|max:191|alpha_dash|unique:languages'
        ]);
        return $rules;
    }
}
