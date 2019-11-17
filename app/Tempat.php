<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tempat extends Model
{
    protected $table = 'tempats';
    protected $guarded = ['id'];

    public function booking()
    {
        return $this->BelongsTo(Booking::class);
    }
}
