<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HearingDate extends Model
{
    use HasFactory;
    protected $table = "hearingdate";
    protected $fillable = ['hearingFor_id',	'case_id',	'next_date'];
    public function CaseR(){
        return $this->belongsTo(CaseR::class,'case_id','id');
    }
    public function approvedlist(){
        return $this->belongsTo(CaseTakenbylaw::class,'case_id','case_reg_id');
    }
    public function HearingFor(){
        return $this->belongsTo(HearingFor::class,'hearingFor_id','id');
    }
}
