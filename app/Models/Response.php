<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $fillable = [
        'hasResponded',
    ];

    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function RequestPrescription()
    {
        return $this->belongsTo('App\Models\RequestPrescription');
    }
}
