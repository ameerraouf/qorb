<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'children_id',
        'target',
        'help_method',
        'behaviours',
        'success_number',
    ];

    function children(){
        return $this->belongsTo(Children::class);
    }
}
