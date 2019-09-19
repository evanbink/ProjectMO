<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    public $table = 'clients';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATUS_RADIO = [
        '1' => 'active',
        '2' => 'non-active',
    ];

    public static $searchable = [
        'name',
        'address',
        'contact_person',
    ];

    protected $fillable = [
        'name',
        'email',
        'status',
        'address',
        'created_at',
        'updated_at',
        'deleted_at',
        'contact_person',
        'contact_number',
    ];

    public function timeProjects()
    {
        return $this->hasMany(TimeProject::class, 'clients_id', 'id');
    }

    public function timeEntries()
    {
        return $this->hasMany(TimeEntry::class, 'clients_id', 'id');
    }
}
