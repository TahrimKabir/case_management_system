<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurisdriction extends Model
{
    use HasFactory;
    protected $table = 'jurisdriction';
    protected $fillable = ['thana_id','court_id'];
    public function IArea(){
        return $this->hasOne(IArea::class,'id','thana_id');
    }
    public function court(){
        return $this->hasOne(Court::class,'id','court_id');
    }
}
