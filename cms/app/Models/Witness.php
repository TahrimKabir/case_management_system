<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Witness extends Model
{
    use HasFactory;
    protected $table = "witness";
    protected $fillable =  ['case_id','witness','fname','mname','address'];
}
