<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    public function delivery(){
        
        return $this->belongsTo(Delivery::class);
    }

    public function package(){
        
        return $this->belongsTo(Package::class);
    }

}
