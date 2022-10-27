<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeUser extends Model
{
    // use HasFactory;
    use SoftDeletes;

    //declare tables
    public $table = 'type_user';

    //this field must type date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    //declare fillable
    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    //one to many terdiri dari 2 path model and field foreign key
    public function detail_user()
    {
        return $this->hasMany('App\Models\ManagementAccess\DetailUser', 'type_user_id');
    }
}
