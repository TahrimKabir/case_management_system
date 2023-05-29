<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    use HasFactory;
    protected $table = "courts";
    protected $fillable = ['court_name','Court_number'];
    public function userInfo(){
        return $this->hasMany(Court::class,'id','court_id');
    }
}
