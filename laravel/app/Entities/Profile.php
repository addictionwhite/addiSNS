<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id'
        ,'nickname'
        ,'content'
        ,'raw_image'
        ,'thumbnail_image'
        ,'mime_type'
    ];
}
