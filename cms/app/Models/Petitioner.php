<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petitioner extends Model
{
    use HasFactory;
    protected $table = "petitioner";
    protected $fillable = ['case_id','petitioner','fname','mname','address','petitionType'];
    
}
