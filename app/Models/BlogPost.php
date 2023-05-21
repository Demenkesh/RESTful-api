<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;
    // this function belong to user also which will help to get the user id's in blog model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
