<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimeProject extends Model
{
    use SoftDeletes;

    public $table = 'time_projects';

    protected $dates = [
        'due_date',
        'start_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'due_date',
        'clients_id',
        'start_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function issues()
    {
        return $this->hasMany(Issue::class, 'projects_name_id', 'id');
    }

    public function timeEntries()
    {
        return $this->hasMany(TimeEntry::class, 'project_id', 'id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'project_name_id', 'id');
    }

    public function clients()
    {
        return $this->belongsTo(Client::class, 'clients_id');
    }

    public function getStartDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDueDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDueDateAttribute($value)
    {
        $this->attributes['due_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
