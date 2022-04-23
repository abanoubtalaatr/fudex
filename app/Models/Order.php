<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer $customer_id
 * @property float $total
 * @property string $address
 * @property string $telephone
 */

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
      'customer_id',
      'total',
      'address',
      'telephone',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
