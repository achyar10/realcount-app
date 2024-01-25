<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function tps()
    {
        return $this->belongsTo(Tps::class);
    }
    
    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
