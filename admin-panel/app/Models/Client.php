<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = "clients";

    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'phone_no',
    ];

    use HasFactory;
}
