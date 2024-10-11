<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Admin;
use App\Models\User;

class AdminCreateRequest extends FormRequest
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
        $rules =  User::$rules;
        $rules = array_merge($rules, [
            'email' => 'required|email|max:191|unique:users',
            'password' => 'required|string|min:8|max:191',
        ]);
        return $rules;
    }
}
