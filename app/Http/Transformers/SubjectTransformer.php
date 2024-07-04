<?php

namespace App\Http\Transformers;


use App\Models\Announcement;
use App\Models\Subject;
use Carbon\Carbon;
use League\Fractal\TransformerAbstract;

class SubjectTransformer extends TransformerAbstract
{
    protected array $availableIncludes = ['image', 'documents'];

    public function transform(Subject $subject): array
    {
        $data = [
            'raw_id' => $subject->id,
            'id' => $subject->uuid,
            'uuid' => $subject->uuid,
            'name_th' => $subject->name_th,
            'name_en' => $subject->name_en,
            'code' => $subject->code,
            'view' => $subject->view,
            'unit' => $subject->unit,
            'description' => $subject->description,
            'professors' => fractal($subject->professors, new ProfessorTransformer())->includeImage()
                ->toArray()['data'],
            'published_at' => Carbon::parse($subject->published_at)->format('Y-m-d'),
            'display_published_at' => $subject->published_at ? Carbon::parse($subject->published_at)
                ->thaidate('j M Y') : null,
        ];
        return $data;
    }

    public function includeImage(Subject $subject)
    {
        $images = $subject->getMedia(Subject::MEDIA_COLLECTION_IMAGE);
        return $this->collection($images, new ImageTransformer());
    }

    public function includeDocuments(Subject $subject)
    {
        $documents = $subject->getMedia(Subject::MEDIA_COLLECTION_DOCUMENTS);
        return $this->collection($documents, new DocumentTransformer());
    }


}
