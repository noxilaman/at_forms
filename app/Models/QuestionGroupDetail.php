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

    public function regenratesequences($question_group_id)
    {
        $questionGroupDetails = QuestionGroupDetail::where('question_group_id', $question_group_id)->orderBy('sequence')->get();
        $sequence = 1;
        foreach ($questionGroupDetails as $questionGroupDetail) {
            $questionGroupDetail->sequence = $sequence;
            $questionGroupDetail->save();
            $sequence++;
        }
    }
}
