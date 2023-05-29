<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourtCat extends Model
{
    use HasFactory;
    protected $table = "courtCat";
    protected $fillable = ['courtCat'];

    public function HearingFor(){
        return $this->hasMany(HearingFor::class,'courtCat_id','id');
    }
}
