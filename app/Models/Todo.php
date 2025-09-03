<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Todo extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $appends = ['attachment_url'];


    protected $fillable = [
        'user_id',
        'title',
        'description',
        'is_done',
        'due_date',
        'priority'
    ];


    protected $casts = [
        'due_date' => 'date',
        'is_done'  => 'boolean',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(200)
            ->height(200)
            ->sharpen(10);
            // Add this only when you want immediate processing other wise by default it is queued
            // ->nonQueued();

        $this->addMediaConversion('medium')
            ->width(600)
            ->height(400);
            // Add this only when you want immediate processing other wise by default it is queued
            // ->nonQueued();
    }


    public function getAttachmentUrlAttribute()
    {
        return $this->getFirstMediaUrl('image');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/gif', 'image/webp']);
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
