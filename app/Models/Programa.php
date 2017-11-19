<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    protected $table = 'programs_restricted';
    
    protected $primaryKey = 'programs_restricted';
    
    protected $fillable = ['programs_restricted', 'enable'];

    public $timestamps = false;

    
}
