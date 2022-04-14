<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestPrescription extends Model
{
    use HasFactory;

    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function Response()
    {
        return $this->hasOne('App\Models\Response');
    }
}
