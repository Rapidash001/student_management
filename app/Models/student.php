<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $table = "Students";
    protected $primarykey = 'id';
    protected $fillable = [
        'lname',
        'fname',
        'midname',
        'age',
        'address',
        'zip'
    ];
}
