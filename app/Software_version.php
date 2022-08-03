<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Software_version extends Model
{
    use SoftDeletes;
    //
    protected $fillable = [
        'software_id','version','version_desc',
    ];

    public function software()
    {
        return $this->belongsTo(Software::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_last_modified_id');
    }
}
