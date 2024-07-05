<?php

namespace App\Http\Transformers;


use App\Models\Announcement;
use App\Models\User;
use Carbon\Carbon;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    //protected array $availableIncludes = ['image', 'documents'];

    public function transform(User $user): array
    {
        $data = [
            //'raw_id' => $subject->id,
            'id' => $user->id,
            'name' => $user->name,
            'institution' => $user->institution,
            'role_id' => $user->role_id,
            'tel' => $user->tel,
            'role' => $user->role->toArray(),
            'email' => $user->email,
        ];
        return $data;
    }

    // public function includeImage(Subject $subject)
    // {
    //     $images = $subject->getMedia(Subject::MEDIA_COLLECTION_IMAGE);
    //     return $this->collection($images, new ImageTransformer());
    // }

    // public function includeDocuments(Subject $subject)
    // {
    //     $documents = $subject->getMedia(Subject::MEDIA_COLLECTION_DOCUMENTS);
    //     return $this->collection($documents, new DocumentTransformer());
    // }


}
