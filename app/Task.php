<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    public $table = 'tasks';

    public static $searchable = [
        'task_name',
        'assign_to',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'task_name',
        'assign_to',
        'main_days',
        'created_at',
        'updated_at',
        'deleted_at',
        'project_name_id',
    ];

    public function authors()
    {
        return $this->belongsToMany(User::class);
    }

    public function project_name()
    {
        return $this->belongsTo(TimeProject::class, 'project_name_id');
    }
}
