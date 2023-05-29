<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefendantInfo extends Model
{
    use HasFactory;
    protected $table = 'defendantInfo';
    protected $fillable = ['case_id','court_id','defendant_id','section','is_present','order','orderForstatus','hearingDate_id'];
}
