<?php

namespace App\Actions\Dashboard;

use App\Models\User;
// use App\Models\Article;
// use App\Models\Subject;
use DOMDocument;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class SaveUserAction
{
    protected User $user;

    public function execute(User $user, array $data)
    {
        $this->user = $user;
        $this->user->name = $data['name'];
        $this->user->institution = $data['institution'];
        $this->user->email = $data['email'];
        $this->user->tel = $data['tel'];
        $this->user->role_id = $data['role_id'];

        if (isset($data['password']) && !empty($data['password'])) {
            $this->updateUserPassword($data['password']);
        }
        $this->user->save();
        $this->user = $this->user->fresh();

        // $this->deleteDocuments(isset($data['to_delete_documents']) ? $data['to_delete_documents'] : []);
        // $this->handleAssignProfessors($data['professors']);
        // $this->uploadSubjectImage($data['image']);
        // $this->uploadSubjectDocuments($data['documents']);

        return $this->user;
    }

    private function updateUserPassword($password)
    {
        $this->user->password = Hash::make($password);
    }
    

    // private function deleteDocuments($documents)
    // {
    //     foreach ($documents as $document) {
    //         $doc = $this->subject->getMedia(Subject::MEDIA_COLLECTION_DOCUMENTS)->where('id', $document['id'])->first();
    //         if ($doc) {
    //             $doc->delete();
    //         }
    //     }
    // }

    // private function handleAssignProfessors($professors): void
    // {
    //     $professorCollection = collect($professors);
    //     $professorIds = $professorCollection->pluck('id')->toArray();
    //     $this->subject->professors()->sync($professorIds);
    // }

    // private function uploadSubjectImage($image): void
    // {
    //     if ($image == null) {
    //         return;
    //     }
    //     $this->subject->addMedia($image)->toMediaCollection(Subject::MEDIA_COLLECTION_IMAGE);
    // }

    // private function uploadSubjectDocuments($documents): void
    // {
    //     foreach ($documents as $document) {
    //         if ($document instanceof UploadedFile) {
    //             $this->subject->addMedia($document)->toMediaCollection(Subject::MEDIA_COLLECTION_DOCUMENTS);
    //         }
    //     }
    // }

}
