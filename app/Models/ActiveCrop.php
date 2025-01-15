<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveCrop extends Model
{
    use HasFactory;
    protected $fillable = ['crop_id', 'status'];
}
