<?php

namespace App\Http\Transformers;


use App\Models\Announcement;
use App\Models\Applicant;
use Carbon\Carbon;
use League\Fractal\TransformerAbstract;
use Phattarachai\ThaiDate\ThaiDate;

class ApplicantTransformer extends TransformerAbstract
{

    public function transform(Applicant $applicant): array
    {
        $data = [
            'id' => $applicant->id,
            'user' => $applicant->user->toArray(),
            'announcement_id' => $applicant->announcement_id,
            'prefix' => $applicant->prefix,
            'first_name' => $applicant->first_name,
            'last_name' => $applicant->last_name,
            'address' => $applicant->address,
            'birth_date' => Carbon::parse($applicant->birth_date)->thaidate('j M Y'),
            'age' => $applicant->age,
            'phone' => $applicant->phone,
            'birth_place' => $applicant->birth_place,
            'race' => $applicant->race,
            'citizen_id' => $applicant->citizen_id,
            'marital_status' => $applicant->marital_status,
            'nationality' => $applicant->nationality,
            'district' => $applicant->district,
            'province' => $applicant->province,
            'card_issued_date' => Carbon::parse($applicant->card_issued_date)->thaidate('j M Y'),
            'card_expiration_date' => Carbon::parse($applicant->card_expiration_date)->thaidate('j M Y'),
            'military_service' => $applicant->military_service,
            'religion' => $applicant->religion,
            'current_occupation' => $applicant->current_occupation,
            'reason_for_leaving' => $applicant->reason_for_leaving,
            'additional_course' => $applicant->additional_course,
            'additional_training' => $applicant->additional_training,
            'achievements' => $applicant->achievements,
            'experience_gained' => $applicant->experience_gained,
            'talent' => $applicant->talent,
            'trainings' => $applicant->trainings,
            'experiences' => $applicant->experiences,
            'references' => $applicant->references
        ];
        return $data;
    }


}
