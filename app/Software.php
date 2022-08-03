<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Software extends Model
{
    use SoftDeletes;
    //
    protected $fillable = [
        'software_name','software_desc','software_img','software_type','user_last_modified_id'
    ];

    public function software_versions()
    {
        return $this->hasMany(Software_version::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_last_modified_id');
    }
}
