<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;
    protected $table = "userinfo";
    protected $fillable = ['court_id','iarea_id'];

    public function IArea()
        {
            return $this->belongsTo(IArea::class,'iarea_id','id');
        }

        public function court()
        {
            return $this->belongsTo(Court::class,'court_id','id');
        }
}
