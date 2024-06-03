<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'renter_name', 'renter_contact', 'renter_address', 'rent_start', 'rent_end', 'property_id'
    ];

    public function property(){

        return $this->belongsTo(Property::class);

    }
}
