<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Car
 *
 * @property int $id
 * @property string $name
 * @property string $registration_number
 * @property bool $is_registered
 * @property Collection|Part[] $parts
 */

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'registration_number', 'is_registered'];

    public function parts()
    {
        return $this->hasMany(Part::class);
    }
}
