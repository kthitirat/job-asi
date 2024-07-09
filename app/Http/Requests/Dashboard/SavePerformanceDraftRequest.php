<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class SavePerformanceDraftRequest extends FormRequest
{
    public function rules()
    {
        $userId = request()->get('user_id');
        $rules = [
            'performance_id' => ['nullable', 'exists:performances,id'],          //เพิ่มตรงนี้กรณีไม่มีเรคคอร์ดในระบบ 
            'institution_head_name' => ['nullable', 'string', 'max:255'],
            'institution_head_position' => ['nullable', 'string', 'max:255'],
            'coordinator_position' => ['nullable', 'string', 'max:255'],
            'name' => ['nullable', 'string', 'max:255'],
            'type' => ['nullable', 'array'],
            'type.*' => ['string', 'max:255'],
            'description' => ['nullable', 'string'],
            'duration' => ['nullable', 'string'],
            'number_of_performers' => ['nullable', 'integer'],
            'directors' => ['nullable', 'string', 'max:255'],
            'performers' => ['nullable', 'string', 'max:255'],
            'musicians_or_narrators' => ['nullable', 'string', 'max:255'],
            'number_of_musicians' => ['nullable', 'integer'],
            'opening_scene' => ['nullable', 'string'],
            'stage_performance' => ['nullable', 'string'],
            'ending_scene' => ['nullable', 'string'],
            'costume_and_props' => ['nullable', 'string'],
            'stage_lighting' => ['nullable', 'string'],
            'sound_type' => ['nullable', 'string'],
            'number_of_microphones' => ['nullable', 'integer'],
            'number_of_amplifiers' => ['nullable', 'integer'],
            'other_specifications' => ['nullable', 'string'],
            'sound_control' => ['nullable', 'string'],
            'institution_representatives' => ['nullable', 'string', 'max:255'],
            'faculty_and_staff' => ['nullable', 'string', 'max:255'],
            'students' => ['nullable', 'string', 'max:255'],
            'vehicles' => ['nullable', 'string'],
            'arrival_date' => ['nullable', 'date'],
            'arrival_time' => ['nullable', 'date_format:H:i'],
            'departure_date' => ['nullable', 'date'],
            'departure_time' => ['nullable', 'date_format:H:i'],
            'accommodation' => ['nullable', 'string'],
            'ceremony_and_reception_details' => ['nullable', 'string'],
            'number_of_institution_heads' => ['nullable', 'integer'],
            'number_of_faculty_and_staff' => ['nullable', 'integer'],
            'number_of_students' => ['nullable', 'integer'],
        ];
        return $rules;
    }
}
