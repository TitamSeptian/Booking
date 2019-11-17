<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = "bookings";
    protected $guarded = ['id'];

    public function tempat()
    {
        return $this->hasMany(Tempat::class);
    }
}
