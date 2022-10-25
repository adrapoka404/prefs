<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
     //Para los permitidos
     protected $fillable = ['user_id','name','surname', 'mail', 'company', 'position', 'mobile', 'birthday', 'daydeath', 'nss', 'zip', 'colony', 'address', 'state'];
     //para los protegidos
     protected $guarded = [''];
}
