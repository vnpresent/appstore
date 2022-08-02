<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    //
    protected $fillable = [
        'software_name','software_desc','software_img','software_type'
    ];

    public function software_versions()
    {
        return $this->hasMany(Software_version::class);
    }
}
