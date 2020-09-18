<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $perPage = 10;

    protected $fillable = [
        'text',
        'is_completed'
    ];
}
