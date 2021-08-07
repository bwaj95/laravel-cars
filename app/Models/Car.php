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

    public function carModels()
    {
        //One-to-Many -> from Car to CarModel.
        return $this->hasMany(CarModel::class);
    }

    public function headquarter()
    {
        return $this->hasOne(Headquarter::class);
    }

    //Define a hasManyThrough relationship.
    //Car -> multiple CarModels -> multiple engine variants.
    public function engines()
    {
        return $this->hasManyThrough(
            Engine::class,
            CarModel::class,
            "car_id", //$firstKey = Foreign key on CarModel table.
            "model_id" //$secondKey = Foreign key on Engine table.
        );
    }

    //Define hasOneThrough reltionship.
    //Car -> model -> one release date per model.
    public function carProductionDate()
    {
        return $this->hasOneThrough(
            CarProductionDate::class,
            CarModel::class,
            "id",
            "model_id"
        );
    }

    public function products()
    {
        return $this->belongsToMany(Products::class);
    }

}
