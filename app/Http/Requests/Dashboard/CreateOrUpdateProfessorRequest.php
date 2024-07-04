<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrUpdateProfessorRequest extends FormRequest
{
    public function rules()
    {
        $rules = [
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:102400'],
            'prefix' => ['required', 'string'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'department_id' => ['required', 'exists:departments,id'],
        ];
        if (request()->method == 'PATCH') {
            $rules['image'] = ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:102400'];
        }
        return $rules;
    }
}
