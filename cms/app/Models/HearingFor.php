<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HearingFor extends Model
{
    use HasFactory;
    protected $table = "hearingfor";
    protected $fillable = ['courtCat_id','hearing_for'];

    public function HearingDate(){
        return $this->hasMany(HearingDate::class,'hearingFor_id','id');
    }
    public function hDate(){
        date_default_timezone_set('Asia/Dhaka');
        return $this->hasMany(HearingDate::class,'hearingFor_id','id')->whereDate('next_date',date('Y-m-d'));
    }
    public function courtCat(){
        return $this->belongsTo(CourtCat::class,'courtCat_id','id');
    }
}
