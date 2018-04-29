<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabinet extends Model
{
    //
    public function services() {
        $this->hasMany(Service::class);
    }

    public function users() {
        $this->hasMany(User::class);
    }

    public function pets() {
        $this->hasMany(Pet::class);
    }
}
