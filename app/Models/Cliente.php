<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'user_restricted';
    
    protected $primaryKey = 'user_restricted';
    
    protected $fillable = ['user_restricted', 'enable'];

    public $timestamps = false;

    
}
