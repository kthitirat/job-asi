<?php

namespace App\Actions\Dashboard;


use App\Models\Performance;
use App\Models\User;
// use App\Models\Article;
// use App\Models\Subject;
use DOMDocument;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class SavePerformanceAction
{
    protected Performance $performance;

    public function execute(Performance $performance, array $data)
    {
        $this->performance = $performance;
        $this->performance->institution_head_name = $data['institution_head_name'];
        $this->performance->institution_head_position = $data['institution_head_position'];
        $this->performance->coordinator_position = $data['coordinator_position'];
        $this->performance->name = $data['name'];
        $this->performance->type = $data['type'];
        $this->performance->description = $data['description'];
        $this->performance->duration = $data['duration'];
        $this->performance->number_of_performers = $data['number_of_performers'];
        $this->performance->directors = $data['directors'];
        $this->performance->performers = $data['performers'];
        $this->performance->musicians_or_narrators = $data['musicians_or_narrators'];
        $this->performance->number_of_musicians = $data['number_of_musicians'];
        $this->performance->opening_scene = $data['opening_scene'];
        $this->performance->stage_performance = $data['stage_performance'];
        $this->performance->ending_scene = $data['ending_scene'];
        $this->performance->costume_and_props = $data['costume_and_props'];
        $this->performance->stage_lighting = $data['stage_lighting'];
        $this->performance->sound_type = $data['sound_type'];
        $this->performance->number_of_microphones = $data['number_of_microphones'];
        $this->performance->number_of_amplifiers = $data['number_of_amplifiers'];
        $this->performance->other_specifications = $data['other_specifications'];
        $this->performance->sound_control = $data['sound_control'];
        $this->performance->institution_representatives = $data['institution_representatives'];
        $this->performance->faculty_and_staff = $data['faculty_and_staff'];
        $this->performance->students = $data['students'];
        $this->performance->vehicles = $data['vehicles'];
        $this->performance->arrival_date = $data['arrival_date'];
        $this->performance->arrival_time = $data['arrival_time'];
        $this->performance->departure_date = $data['departure_date'];
        $this->performance->departure_time = $data['departure_time'];
        $this->performance->accommodation = $data['accommodation'];
        $this->performance->ceremony_and_reception_details = $data['ceremony_and_reception_details'];
        $this->performance->number_of_institution_heads = $data['number_of_institution_heads'];
        $this->performance->number_of_faculty_and_staff = $data['number_of_faculty_and_staff'];
        $this->performance->number_of_students = $data['number_of_students'];   
        $performance->save();
        return $performance;

       // $this->performance = $this->performance->fresh();

        // $this->deleteDocuments(isset($data['to_delete_documents']) ? $data['to_delete_documents'] : []);
        // $this->handleAssignProfessors($data['professors']);
        // $this->uploadSubjectImage($data['image']);
        // $this->uploadSubjectDocuments($data['documents']);

        //return $this->performance;
    }

    // private function updateUserPassword($password)
    // {
    //     $this->user->password = Hash::make($password);
    // }
    

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
