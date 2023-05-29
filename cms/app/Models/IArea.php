<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IArea extends Model
{
    use HasFactory;
    protected $table = 'investigation_area';
    protected $fillable = ['area','area_name'];

    public function userInfo()
        {
            return $this->hasMany(IArea::class,'id','iarea_id');
        }
        public function CaseR()
        {
            return $this->hasMany(CaseR::class,'id','jurisdriction_id');
        }

        public function Jurisdriction()
        {
            return $this->hasOne(Jurisdriction::class,'thana_id','id');
        }
}