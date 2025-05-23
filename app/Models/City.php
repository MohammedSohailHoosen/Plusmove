<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function users(){

    return $this->hasMany(User::class);
    }

    public function deliveries(){

    return $this->hasMany(Delivery::class);
    }

}
