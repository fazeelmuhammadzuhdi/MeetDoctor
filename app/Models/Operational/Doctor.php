<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    // use HasFactory;
    use SoftDeletes;

    //declare tables
    public $table = 'doctor';

    //this field must type date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    //declare fillable
    protected $fillable = [
        'specialist_id',
        'name',
        'fee',
        'photo',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function specialist()
    {
        return $this->belongsTo('App\Models\MasterData\Specialist', 'specialist_id', 'id');
    }

    public function appointment()
    {
        return $this->hasMany('App\Models\Operational\Appointment', 'doctor_id');
    }
}
