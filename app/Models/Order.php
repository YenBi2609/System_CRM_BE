<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\User;

class Order extends Model
{
    use HasFactory;
    public function clients()
    {
        return $this->belongsTo(Client::class,'idClient');
    }
    public function users()
    {
        return $this->belongsTo(User::class,'idUser');
    }
}
