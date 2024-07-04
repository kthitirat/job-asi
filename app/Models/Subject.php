<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Str;

class Subject extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    public const MEDIA_COLLECTION_IMAGE = 'image';
    public const MEDIA_COLLECTION_DOCUMENTS = 'documents';

    protected $fillable = [
        'name_th',
        'name_en',
        'code',
        'description',
        'unit',
        'published_at',
        'view',
        'uuid'
    ];
    protected $casts = [
        'published_at' => 'datetime',
        'view' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($subject) {
            $subject->uuid = Str::uuid();
        });
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(self::MEDIA_COLLECTION_IMAGE)->singleFile()
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('optimized')
                    ->fit(Manipulations::FIT_MAX, 1072, 1528)
                    ->optimize()
                    ->keepOriginalImageFormat();
            });

        $this->addMediaCollection(self::MEDIA_COLLECTION_DOCUMENTS);
    }

    public function professors()
    {
        return $this->belongsToMany(Professor::class);
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        if (isset($filters['search']) && $filters['search'] != null) {
            $searchTerm = $filters['search'];
            $query->where(function ($query) use ($searchTerm) {
                $query->where('name_th', 'LIKE', "%$searchTerm%")
                    ->orWhere('name_en', 'LIKE', "%$searchTerm%")
                    ->orWhere('code', 'LIKE', "%$searchTerm%");
            })->orWhereHas('professors', function ($query) use ($searchTerm) {
                $query->where('first_name', 'LIKE', "%$searchTerm%")
                    ->orWhere('last_name', 'LIKE', "%$searchTerm%");
            })->orWhereHas('professors.department', function ($query) use ($searchTerm) {
                $query->where('name', 'LIKE', "%$searchTerm%");
            });
        }
    }
}
