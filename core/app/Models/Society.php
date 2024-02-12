<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Society extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_ar',
        'question_en',
        'status',
    ];

    public function replies()
    {
        return $this->hasMany(SocietyReply::class);
    }

    public function countReplies()
    {
        return $this->replies->count();
    }
}
