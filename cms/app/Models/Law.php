<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Law extends Model
{
    use HasFactory;
    protected $table = 'law';
    protected $fillable = ['law_name','p_code','section','desc'];
    public function PetitionerFilledLaw()
    {
        return $this->hasMany(PetitionerFilledLaw::class,'law_id','id');
    }

    public function ApproveCourtCase()
    {
        return $this->hasMany(ApproveCourtCase::class,'approvedbylaw_id','id');
    }
}
