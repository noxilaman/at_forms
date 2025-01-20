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

    public function regenratesequences($question_set_id)
    {
        $questionSetDetails = QuestionSetDetail::where('question_set_id', $question_set_id)->orderBy('sequence')->get();
        $sequence = 1;
        foreach ($questionSetDetails as $questionSetDetail) {
            $questionSetDetail->sequence = $sequence;
            $questionSetDetail->save();
            $sequence++;
        }
    }
}
