<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Tanker extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dates = ['deleted_at'];
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
