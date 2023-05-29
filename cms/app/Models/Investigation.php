<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investigation extends Model
{
    use HasFactory;
    protected $table = 'investigation';
    protected $fillable = ['thana_id','pbi_id','case_id','enddate'];

    public function CaseR(){
        return $this->hasOne(CaseR::class,'id','case_id');
    }
}
