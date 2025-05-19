<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryPersonnel extends Model
{
    public function deliveryPackages(){

    return $this->hasMany(DeliveryPackage::class, 'delivery_personnel_id');
    }

}
