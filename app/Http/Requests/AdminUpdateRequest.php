<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Admin;
use App\Models\User;

class AdminUpdateRequest extends FormRequest
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
        $rules = User::$rules;

        $rules = array_merge($rules, [
            'email' => 'required|unique:users,email,' . $this->admin,
            'password' => 'nullable|string|min:8|max:191',
        ]);
        // $rules = array_merge($rules,['file' => 'nullable|mimes:jpg,png,jpeg,gif,doc,docx,pdf,ppt,pptx,xls,xlsx|max:10000']);
        return $rules;
    }
}
