<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Station;

class Location extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dates = ['deleted_at'];
    use SoftDeletes;

    public function station()
    {
        return $this->hasOne(Station::class);
    }

}
