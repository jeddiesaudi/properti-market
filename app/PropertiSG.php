<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertiSG extends Model
{
    protected $table = 'rumahs';

    protected $fillable = [
        'stok'
    ];

    public function property(){

        return $this->belongsTo(Property::class);

    }
}
