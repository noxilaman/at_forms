<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFarmer extends Model
{
    use HasFactory;
    protected $connection = 'agri360db';
    protected $table = 'user_farmer';
    protected $fillable = [
        'crop_id',
        'user_id',
        'manager_id',
        'review_id',
        'broker_id',
        'area_id',
        'farmer_id',
        'head_id',
        'sowing_city',
        'farmer_code',
        'status',
        'createdBy',
        'modifiedBy',
        'created',
        'modified',
        'custom1',
        'custom2',
        'custom3',
        'custom4',
        'custom5',
    ];
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

    public function crop()
    {
        return $this->hasOne(Crop::class, 'id', 'crop_id');
    }

    public function broker()
    {
        return $this->hasOne(Broker::class, 'id', 'broker_id');
    }

    public function farmer()
    {
        return $this->hasOne(Farmer::class, 'id', 'farmer_id');
    }

    public function sowings()
    {
        return $this->hasMany(Sowing::class, 'user_farmer_id', 'id');
    }
}
