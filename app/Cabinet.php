<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabinet extends Model {
    
    protected $appends = [
        '_users',
        '_services',
    ];

    public function getUsersAttribute(){
        return $this->users()->get();
    }

    public function getServicesAttribute(){
        return $this->services()->get();
    }

    public function services() {
        return $this->hasMany(Service::class);
    }

    public function users() {
        return $this->hasMany(User::class);
    }

    public function pets() {
        return $this->hasMany(Pet::class);
    }
}
