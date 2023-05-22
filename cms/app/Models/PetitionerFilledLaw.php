<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetitionerFilledLaw extends Model
{
    use HasFactory;
    protected $table = "petitioner_filed_law";
    protected $fillable=['case_id','law_id'];
    public function law()
    {
        return $this->belongsTo(Law::class,'law_id','id');
    }
}
