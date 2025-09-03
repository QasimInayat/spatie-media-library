<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model implements HasMedia
{
    use InteractsWithMedia;


    public function getAttachmentUrlAttribute()
    {
        return $this->getFirstMediaUrl('image');
    }

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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
