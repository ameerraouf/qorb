<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommonQuestion extends Model
{
    use HasFactory;

    protected $append = [
        'question','answer'
    ];

    public $appends=['question','answer'];

    public function getQuestionAttribute(){
        return app()->getLocale() == 'ar'?$this->question_ar:$this->question_en;
    }

    public function getAnswerAttribute(){
        return app()->getLocale() == 'ar'?$this->answer_ar:$this->answer_en;
    }
}
