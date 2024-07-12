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
        $this->performance->institution_head_name = isset($data['institution_head_name']) ? $data['institution_head_name'] : null;
        $this->performance->institution_head_position = isset($data['institution_head_position']) ? $data['institution_head_position'] : null;
        $this->performance->coordinator_position = isset($data['coordinator_position']) ? $data['coordinator_position'] : null;
        $this->performance->name = isset($data['name']) ? $data['name'] : null;
        $this->performance->type = isset($data['type']) ? $data['type'] : null;
        $this->performance->description = isset($data['description']) ? $data['description'] : null;
        $this->performance->duration = isset($data['duration']) ? $data['duration'] : null;
        $this->performance->number_of_performers = isset($data['number_of_performers']) ? $data['number_of_performers'] : null;
        $this->performance->directors = isset($data['directors']) ? $data['directors'] : null;
        $this->performance->performers = isset($data['performers']) ? $data['performers'] : null;
        $this->performance->musicians_or_narrators = isset($data['musicians_or_narrators']) ? $data['musicians_or_narrators'] : null;
        $this->performance->number_of_musicians = isset($data['number_of_musicians']) ? $data['number_of_musicians'] : null;
        $this->performance->opening_scene = isset($data['opening_scene']) ? $data['opening_scene'] : null;
        $this->performance->stage_performance = isset($data['stage_performance']) ? $data['stage_performance'] : null;
        $this->performance->ending_scene = isset($data['ending_scene']) ? $data['ending_scene'] : null;
        $this->performance->costume_and_props = isset($data['costume_and_props']) ? $data['costume_and_props'] : null;
        $this->performance->stage_lighting = isset($data['stage_lighting']) ? $data['stage_lighting'] : null;
        $this->performance->sound_type = isset($data['sound_type']) ? $data['sound_type'] : null;
        $this->performance->number_of_microphones = isset($data['number_of_microphones']) ? $data['number_of_microphones'] : null;
        $this->performance->number_of_amplifiers = isset($data['number_of_amplifiers']) ? $data['number_of_amplifiers'] : null;
        $this->performance->other_specifications = isset($data['other_specifications']) ? $data['other_specifications'] : null;
        $this->performance->sound_control = isset($data['sound_control']) ? $data['sound_control'] : null;
        $this->performance->institution_representatives = isset($data['institution_representatives']) ? $data['institution_representatives'] : null;
        $this->performance->faculty_and_staff = isset($data['faculty_and_staff']) ? $data['faculty_and_staff'] : null;
        $this->performance->students = isset($data['students']) ? $data['students'] : null;
        $this->performance->vehicles = isset($data['vehicles']) ? $data['vehicles'] : null;
        $this->performance->arrival_date = isset($data['arrival_date']) ? $data['arrival_date'] : null;
        $this->performance->arrival_time = isset($data['arrival_time']) ? $data['arrival_time'] : null;
        $this->performance->departure_date = isset($data['departure_date']) ? $data['departure_date'] : null;
        $this->performance->departure_time = isset($data['departure_time']) ? $data['departure_time'] : null;
        $this->performance->accommodation = isset($data['accommodation']) ? $data['accommodation'] : null;
        $this->performance->ceremony_and_reception_details = isset($data['ceremony_and_reception_details']) ? $data['ceremony_and_reception_details'] : null;
        $this->performance->number_of_institution_heads = isset($data['number_of_institution_heads']) ? $data['number_of_institution_heads'] : null;
        $this->performance->number_of_faculty_and_staff = isset($data['number_of_faculty_and_staff']) ? $data['number_of_faculty_and_staff'] : null;
        $this->performance->number_of_students = isset($data['number_of_students']) ? $data['number_of_students'] : null;
        
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
