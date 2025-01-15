<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionSetDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_set_id',
        'question_group_id',
        'sequence',
        'status',
    ];

    public function questionSet()
    {
        return $this->belongsTo(QuestionSet::class);
    }

    public function questionGroup()
    {
        return $this->belongsTo(QuestionGroup::class);
    }

}
