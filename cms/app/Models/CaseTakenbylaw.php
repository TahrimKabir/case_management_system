<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseTakenbylaw extends Model
{
    use HasFactory;
    protected $table = "approvecourtcase";
    protected $fillable = ['case_reg_id','approvedbylaw_id'];
    public function Register(){
        return $this->hasOne(CaseR::class,'case_reg_id','id');
    }
}
