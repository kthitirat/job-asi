<?php

namespace App\Http\Transformers;


use App\Models\Announcement;
use App\Models\Performance;
use Carbon\Carbon;
use League\Fractal\TransformerAbstract;

class PerformanceTransformer extends TransformerAbstract
{
    protected array $availableIncludes = ['images'];

    public function transform(Performance $performance): array
    {
        $data = [
            'id' => (int)$performance->id,
            'user_id' => (int)$performance->user_id,
            'institution_head_name' => $performance->institution_head_name,
            'institution_head_position' => $performance->institution_head_position,
            'coordinator_position' => $performance->coordinator_position,
            'name' => $performance->name,
            'type' => $performance->type ?? [],
            'description' => $performance->description,
            'duration' => $performance->duration,
            'number_of_performers' => (int)$performance->number_of_performers,
            'directors' => $performance->directors,
            'performers' => $performance->performers,
            'musicians_or_narrators' => $performance->musicians_or_narrators,
            'number_of_musicians' => (int)$performance->number_of_musicians,
            'opening_scene' => $performance->opening_scene,
            'stage_performance' => $performance->stage_performance,
            'ending_scene' => $performance->ending_scene,
            'costume_and_props' => $performance->costume_and_props,
            'stage_lighting' => $performance->stage_lighting,
            'sound_type' => $performance->sound_type,
            'number_of_microphones' => (int)$performance->number_of_microphones,
            'number_of_amplifiers' => (int)$performance->number_of_amplifiers,
            'other_specifications' => $performance->other_specifications,
            'sound_control' => $performance->sound_control,
            'institution_representatives' => $performance->institution_representatives,
            'faculty_and_staff' => $performance->faculty_and_staff,
            'students' => $performance->students,
            'vehicles' => $performance->vehicles,

            // 'arrival_date' => $performance->arrival_date ? $performance->arrival_date
            //     ->format('Y-m-d') : null, 
            'arrival_date' => $performance->arrival_date ? Carbon::parse($performance->arrival_date)
                ->thaidate('j M Y') : null,

            'arrival_time' => $performance->arrival_time ? Carbon::parse($performance->arrival_time)
                ->format('H:i') : null,

            // 'departure_date' => $performance->departure_date ? $performance->departure_date
            //     ->format('Y-m-d') : null,
            'departure_date' => $performance->departure_date ? Carbon::parse($performance->departure_date)
                ->thaidate('j M Y') : null,

            'departure_time' => $performance->departure_time ? Carbon::parse($performance->departure_time)
                ->format('H:i') : null,
            'accommodation' => $performance->accommodation,
            'ceremony_and_reception_details' => $performance->ceremony_and_reception_details,
            'number_of_institution_heads' => (int)$performance->number_of_institution_heads,
            'number_of_faculty_and_staff' => (int)$performance->number_of_faculty_and_staff,
            'number_of_students' => (int)$performance->number_of_students,
            'is_published' => (bool)$performance->is_published,
            'created_at' => $performance->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $performance->updated_at->format('Y-m-d H:i:s'),
            // 'submitted_at' => $performance->updated_at->format('d/m/Y'),
            'submitted_at' => $performance->updated_at ? Carbon::parse($performance->updated_at)
                ->thaidate('j M Y') : null,
            'owner' => fractal($performance->owner, new UserTransformer())->toArray()
        ];
        return $data;
    }

    public function includeImages(Performance $performance)
    {
        $images = $performance->getMedia(Performance::MEDIA_COLLECTION_IMAGES);
        return $this->collection($images, new ImageTransformer());
    }

    // public function includeDocuments(Subject $subject)
    // {
    //     $documents = $subject->getMedia(Subject::MEDIA_COLLECTION_DOCUMENTS);
    //     return $this->collection($documents, new DocumentTransformer());
    // }


}
