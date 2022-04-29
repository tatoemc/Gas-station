<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Location;
use App\Models\Feed;



class Station extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dates = ['deleted_at'];
    use SoftDeletes;

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function feeds()
    {
        return $this->hasMany(Feed::class); 
    }


}
