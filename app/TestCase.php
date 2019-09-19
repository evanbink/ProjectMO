<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestCase extends Model
{
    use SoftDeletes;

    public $table = 'test_cases';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static $searchable = [
        'notes',
        'status',
        'summary',
        'test_case',
    ];

    const STATUS_SELECT = [
        '1' => 'Passed',
        '2' => 'Failed',
        '3' => 'Hold',
    ];

    protected $fillable = [
        'data',
        'title',
        'steps',
        'notes',
        'status',
        'summary',
        'test_case',
        'created_at',
        'updated_at',
        'deleted_at',
        'actual_result',
        'post_condition',
        'modified_by_id',
        'expected_result',
    ];

    public function issues()
    {
        return $this->hasMany(Issue::class, 'testcase_id', 'id');
    }

    public function authors()
    {
        return $this->belongsToMany(User::class);
    }

    public function modified_by()
    {
        return $this->belongsTo(User::class, 'modified_by_id');
    }
}
