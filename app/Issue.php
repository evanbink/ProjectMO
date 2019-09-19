<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Issue extends Model
{
    use SoftDeletes;

    public $table = 'issues';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const PRIORITY_SELECT = [
        '1' => 'Very High',
        '2' => 'High',
        '3' => 'Medium',
        '4' => 'Low',
    ];

    protected $fillable = [
        'desc',
        'priority',
        'created_at',
        'updated_at',
        'deleted_at',
        'testcase_id',
        'progress_id',
        'projects_name_id',
    ];

    public function bugsRepos()
    {
        return $this->hasMany(BugsRepo::class, 'related_id', 'id');
    }

    public function projects_name()
    {
        return $this->belongsTo(TimeProject::class, 'projects_name_id');
    }

    public function testcase()
    {
        return $this->belongsTo(TestCase::class, 'testcase_id');
    }

    public function progress()
    {
        return $this->belongsTo(TestCase::class, 'progress_id');
    }
}
