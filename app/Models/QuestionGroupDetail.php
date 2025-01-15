<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionGroupDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_group_id',
        'question_id',
        'sequence',
        'status',
    ];

    public function questionGroup()
    {
        return $this->belongsTo(QuestionGroup::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
