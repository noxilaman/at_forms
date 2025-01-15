<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HarvestLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'harvester_id',
        'crop_id',
        'farmer_id',
        'farmer_name',
        'harvest_date',
        'area',
        'driver_id',
        'land_code',
        'area_size',
        'start_time',
        'end_time',
        'yield',
        'fuel_litres',
        'weather',
        'notes',
        'progress_status',
        'picture',
        'picture_path',
        'duration',
        'status'
    ];

    public function harvester()
    {
        return $this->belongsTo(Harvester::class);
    }

    public function crop()
    {
        return $this->belongsTo(Crop::class);
    }

    public function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function harvestIssues()
    {
        return $this->hasMany(HarvestIssue::class);
    }

}
