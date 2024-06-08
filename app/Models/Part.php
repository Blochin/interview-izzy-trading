<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Part
 *
 * @property int $id
 * @property string $name
 * @property string $serial_number
 * @property int $car_id
 */
class Part extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'serial_number', 'car_id'];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
