<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryPackage extends Model
{
    //

    protected $fillable = [
    'tracking_number',
    'sender_name',
    'recipient_name',
    'origin',
    'destination',
    'weight',
    'status',
    ];

    public function deliveryPersonnel(){
    return $this->belongsTo(DeliveryPersonnel::class, 'delivery_personnel_id');
    }

}
