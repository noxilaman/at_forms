<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HarvestIssue extends Model
{
    use HasFactory;
    protected $fillable = [
        'harvest_log_id',
        'issue',
        'description',
        'start_time',
        'end_time',
        'duration',
        'picture',
        'picture_path',
        'status'
    ];

    public function harvestLog()
    {
        return $this->belongsTo(HarvestLog::class);
    }
}
