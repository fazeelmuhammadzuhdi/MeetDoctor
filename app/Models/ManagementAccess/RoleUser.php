<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoleUser extends Model
{
    // use HasFactory;
    use SoftDeletes;

    //declare tables
    public $table = 'role_user';

    //this field must type date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    //declare fillable
    protected $fillable = [
        'role_id',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\ManagementAccess\Role', 'role_id', 'id');
    }
}
