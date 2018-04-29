<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    public function cabinet() {
        $this->belongsTo(Cabinet::class);
    }
}
