<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sowing extends Model
{
    use HasFactory;
    protected $connection = 'agri360db';
    protected $table = 'sowings';
    protected $fillable = [
        'crop_id',
        'farmer_id',
        'input_item_id',
        'harvest_type_id',
        'land_size',
        'item_value',
        'gps_land',
        'gps_seed',
        'status',
        'grow_rate',
        'grow_date',
        'grow_note',
        'start_date',
        'details',
        'relate',
        'n_pos',
        's_pos',
        'e_pos',
        'w_pos',
        'createdBy',
        'modifiedBy',
        'created',
        'modified',
        'area_id',
        'prev1',
        'prev2',
        'prev3',
        'head_id',
        'user_id',
        'current_land',
        'fail_land',
        'fail_date',
        'fail_condition',
        'yield_rate',
        'name',
        'amg_land',
        'ph_water',
        'ph_soy',
        'land_status',
        'seed_code_id',
        'seed_pack_id',
        'harvest_status',
        'seed_code_text',
        'seed_code_date',
        'farmer_status',
        'raw_json',
        'yield_rate7',
        'lat',
        'lng',
        'qa_status',
        'qc_status',
        'user_farmer_id',
        'a2seed',
        'a3seed',
        'f_land',
        'post_harvest_complain',
        'post_harvest_qc',
        'post_harvest_qa',
        'post_harvest_er',
        'harvest_stage',
        'check_current_date',
        'n_pos_current',
        's_pos_current',
        'e_pos_current',
        'w_pos_current',
        'land_type',
        'same_land',
        'qa_grade',
        'qa_risk',
        'seedperhole',
        'gaphole',
        'seedperhole2',
        'gaphole2',
        'area_type',
        'groove_type'
    ];
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

    public function crop()
    {
        return $this->hasOne(Crop::class, 'id', 'crop_id');
    }

    public function farmer()
    {
        return $this->hasOne(Farmer::class, 'id', 'farmer_id');
    }

    public function userFarmer()
    {
        return $this->hasOne(UserFarmer::class, 'id', 'user_farmer_id');
    }
}
