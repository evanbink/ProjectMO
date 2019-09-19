<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class BugsRepo extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'bugs_repos';

    protected $appends = [
        'attach',
    ];

    public static $searchable = [
        'desc',
        'cause',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'desc',
        'cause',
        'related_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function getAttachAttribute()
    {
        $file = $this->getMedia('attach')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }

    public function related()
    {
        return $this->belongsTo(Issue::class, 'related_id');
    }
}
