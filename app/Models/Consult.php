<?php

namespace App\Models;

use App\Model;

class Consult extends Model
{
    protected $guarded = ['id'];

    protected $appends = ['info_item'];

    public function getInfoItemAttribute()
    {
        return json_decode($this->info, true);
    }
}
