<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocietyReply extends Model
{
    use HasFactory;
    protected $fillable = [
        'society_id',
        'reply',
    ];
    public function society()
    {
        return $this->belongsTo(Society::class);
    }
}
