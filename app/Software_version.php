<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Software_version extends Model
{
    //
    protected $fillable = [
        'software_id','version','version_desc',
    ];

    public function software()
    {
        return $this->belongsTo(Software::class);
    }
}
