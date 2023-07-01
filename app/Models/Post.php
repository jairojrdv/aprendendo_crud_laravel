<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = ['name'];

    /**
     * The attributes that should be cast.
      */
    // protected $casts = [
    //     'id' => 'int',
    //     'name' => 'string',
    // ];
}
