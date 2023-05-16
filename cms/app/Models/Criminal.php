<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criminal extends Model
{
    use HasFactory;
    protected $table = "criminal";
    protected $fillable =  ['case_id','criminal','fname','mname','address'];
}
