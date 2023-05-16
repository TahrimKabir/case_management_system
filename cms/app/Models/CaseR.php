<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseR extends Model
{
    use HasFactory;
    protected $table = "case";
    protected $fillable = ['casetype','law_id','case_cat','court_id'];

    public function petition(){
        return $this->hasOne(Petitioner::class,'case_id','id');
    }
    public function criminal(){
        return $this->hasMany(Criminal::class,'case_id','id');
    }
}
