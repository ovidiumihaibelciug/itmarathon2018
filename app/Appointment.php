<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    public function cabinet() {
        return $this->belongsTo(Cabinet::class);
    }
}
