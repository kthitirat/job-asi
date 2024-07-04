<?php

namespace App\Actions\Dashboard;

use App\Models\Announcement;
use App\Models\Article;
use App\Models\Subject;
use DOMDocument;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class SaveSubjectAction
{
    protected Subject $subject;

    public function execute(Subject $subject, array $data)
    {
        $this->subject = $subject;
        $this->subject->code = $data['code'];
        $this->subject->name_th = $data['name_th'];
        $this->subject->name_en = $data['name_en'];
        $this->subject->unit = $data['unit'];
        $this->subject->published_at = $data['published_at'];
        $this->subject->description = $data['description'];
        $this->subject->save();

        $this->subject = $this->subject->fresh();
        $this->deleteDocuments(isset($data['to_delete_documents']) ? $data['to_delete_documents'] : []);
        $this->handleAssignProfessors($data['professors']);
        $this->uploadSubjectImage($data['image']);
        $this->uploadSubjectDocuments($data['documents']);

        return $this->subject;
    }

    private function deleteDocuments($documents)
    {
        foreach ($documents as $document) {
            $doc = $this->subject->getMedia(Subject::MEDIA_COLLECTION_DOCUMENTS)->where('id', $document['id'])->first();
            if ($doc) {
                $doc->delete();
            }
        }
    }

    private function handleAssignProfessors($professors): void
    {
        $professorCollection = collect($professors);
        $professorIds = $professorCollection->pluck('id')->toArray();
        $this->subject->professors()->sync($professorIds);
    }

    private function uploadSubjectImage($image): void
    {
        if ($image == null) {
            return;
        }
        $this->subject->addMedia($image)->toMediaCollection(Subject::MEDIA_COLLECTION_IMAGE);
    }

    private function uploadSubjectDocuments($documents): void
    {
        foreach ($documents as $document) {
            if ($document instanceof UploadedFile) {
                $this->subject->addMedia($document)->toMediaCollection(Subject::MEDIA_COLLECTION_DOCUMENTS);
            }
        }
    }

}
