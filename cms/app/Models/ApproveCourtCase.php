<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApproveCourtCase extends Model
{
    use HasFactory;
    protected $table = "case_takenby_law";
    protected $fillable = ['case_reg_id','approvedbylaw_id'];
    public function cr(){
        return $this->hasOne(CaseR::class,'id','case_reg_id');
    }
    public function petition(){
        return $this->hasOne(Petitioner::class,'case_id','case_reg_id');
    }
    public function criminal(){
        return $this->hasMany(Criminal::class,'case_id','case_reg_id');
    }
    // public function petitionerFilledLaw(){
    //     return $this->hasMany(PetitionerFilledLaw::class,'case_id','case_reg_id');
    // }

    public function law()
    {
        return $this->belongsTo(Law::class,'approvedbylaw_id','id');
    }
    // //  PetitionerFilledLaw
}
