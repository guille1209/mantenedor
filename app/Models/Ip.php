<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ip extends Model
{
    protected $table = 'ips_restricted';
    
    protected $primaryKey = 'ip_restricted';
    
    protected $fillable = ['ip_restricted', 'enable'];

    public $timestamps = false;

    
}
