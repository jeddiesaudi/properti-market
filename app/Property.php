<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'name','type','amount','city','wilayah','description','images', 'periode'
    ];

    public function house(){

        return $this->belongsTo(PropertiSG::class);

    }

    public function user(){

        return $this->belongsTo(User::class);
        
    }

    public function reportproperties(){

        return $this->hasMany(ReportProperty::class);

    }

    public function favorites(){

        return $this->hasMany(Favorit::class);

    }
}
