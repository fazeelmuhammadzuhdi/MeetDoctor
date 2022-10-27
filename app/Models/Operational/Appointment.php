<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    // use HasFactory;
    use SoftDeletes;

    //declare tables
    public $table = 'appointment';

    //this field must type date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    //declare fillable
    protected $fillable = [
        'doctor_id',
        'user_id',
        'consultation_id',
        'level',
        'date',
        'time',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function doctor()
    {
        return $this->belongsTo('App\Models\Operational\Doctor', 'doctor_id', 'id');
    }

    public function consultation()
    {
        return $this->belongsTo('App\Models\MasterData\Consultation', 'consultation_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function transaction()
    {
        return $this->hasOne('App\Models\Operational\Transaction', 'appointment_id');
    }
}
