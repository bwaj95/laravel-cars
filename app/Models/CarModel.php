<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $table = "car_models";
    protected $primaryKey = "id";
    protected $fillable = ["car_id", "model_name"];

    public function car()
    {
        //One-to-Many -> from Car to CarModel.
        return $this->belongsTo(Car::class);
    }

}
