<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    public function driver(){
        
        return $this->belongsTo(User::class, 'driver_id');
    }

    public function city(){
        
        return $this->belongsTo(City::class);
    }

    public function assignments(){
        
        return $this->hasMany(Assignment::class);
    }

    public function packages(){
        
        return $this->hasMany(Package::class);
    }

}
