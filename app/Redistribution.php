<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Redistribution extends Model
{   
    protected $fillable = [
        'color_number', 'original_matrix', 'ordered_matrix'
    ];
}
