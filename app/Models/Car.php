<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    //Optional, but can be set.
    //Set false if not needed, like for primaryKey, timestamps, etc.
    protected $table = "cars";
    protected $primaryKey = "id";

    protected $fillable = ["name", "founded", "description"];

}
