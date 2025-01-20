<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintainDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'maintain_master_id',
        'question_group_id',
        'question_id',
        'sequence',
        'answer1',
        'answer2',
        'answer3',
        'answer4',
        'answer5',
        'note1',
        'note2',
        'note3',
        'note4',
        'note5',
        'status',
    ];

    public function maintainMaster()
    {
        return $this->belongsTo(MaintainMaster::class);
    }

    public function questionGroup()
    {
        return $this->belongsTo(QuestionGroup::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

}
