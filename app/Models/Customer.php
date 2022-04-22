<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property string $store_credit
 */

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
      'email',
      'first_name',
      'last_name',
      'store_credit',
    ];

    /**
     * @return HasMany
     */
    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
