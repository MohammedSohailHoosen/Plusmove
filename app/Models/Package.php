<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    public function customer(){
        
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function delivery(){
        
        return $this->belongsTo(Delivery::class);
    }

}
