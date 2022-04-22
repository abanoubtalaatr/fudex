<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property string $description
 * @property float $price
 */
class Item extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'description',
      'price'
    ];
}
