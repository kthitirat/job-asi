<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Performance extends Model  implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    public const MEDIA_COLLECTION_IMAGES = 'images';

    protected $fillable = [
        'user_id',
        'institution_head_name',
        'institution_head_position',
        'coordinator_position',
        'name',
        'type',
        'description',
        'duration',
        'number_of_performers',
        'directors',
        'performers',
        'musicians_or_narrators',
        'number_of_musicians',
        'opening_scene',
        'stage_performance',
        'ending_scene',
        'costume_and_props',
        'stage_lighting',
        'sound_type',
        'number_of_microphones',
        'number_of_amplifiers',
        'other_specifications',
        'sound_control',
        'institution_representatives',
        'faculty_and_staff',
        'students',
        'vehicles',
        'arrival_date',
        'arrival_time',
        'departure_date',
        'departure_time',
        'accommodation',
        'ceremony_and_reception_details',
        'number_of_institution_heads',
        'number_of_faculty_and_staff',
        'number_of_students',
    ];
    protected $casts = [
        'type' => 'array',
        'arrival_date' => 'date',
        'departure_date' => 'date',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(self::MEDIA_COLLECTION_IMAGES)
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('optimized')
                    ->fit(Manipulations::FIT_MAX, 800, 800)
                    ->optimize()
                    ->keepOriginalImageFormat();
            });

    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


   
}
