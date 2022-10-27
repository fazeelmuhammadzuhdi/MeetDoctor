<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    // use HasFactory;
    use SoftDeletes;

    //declare tables
    public $table = 'permission';

    //this field must type date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    //declare fillable
    protected $fillable = [
        'title',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function permission_role()
    {
        return $this->hasMany('App\Models\ManagementAccess\PermissionRole', 'permission_id');
    }
}
