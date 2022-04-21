<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
