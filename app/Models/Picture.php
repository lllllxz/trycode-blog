<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = [
        'status',
        'file_path',
        'url_to',
        'content',
        'order',
        'position'
    ];


    public function getFilePathAttribute($param)
    {
        return url('uploads/'.$param);
    }
}
