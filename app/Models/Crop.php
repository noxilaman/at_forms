<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    use HasFactory;
    protected $connection = 'agri360db';
    protected $table = 'crops';
    protected $fillable = [
        'name',
        'details',
        'sap_code',
        'startdate',
        'enddate',
        'linkurl',
        'createdBy',
        'modifiedBy',
        'max_per_day',
    ];
    // ต้องเปลี่ยน timestamp
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

}
