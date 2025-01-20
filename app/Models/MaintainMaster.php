<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintainMaster extends Model
{
    use HasFactory;

    protected $fillable = [
        'maintain_date',
        'harvester_id',
        'mechanic_id',
        'driver_id',
        'question_set_id',
        'note',
        'process_status',
        'status',
    ];

    public function maintainDetails()
    {
        return $this->hasMany(MaintainDetail::class);
    }

    public function harvester()
    {
        return $this->belongsTo(Harvester::class);
    }

    public function mechanic()
    {
        return $this->belongsTo(Mechanic::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function questionSet()
    {
        return $this->belongsTo(QuestionSet::class);
    }

}
