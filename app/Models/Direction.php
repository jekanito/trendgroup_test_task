<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Currency;

class Direction extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_currency_id',
        'second_currency_id',
        'min_sum_for_exchange',
        'max_sum_for_exchange',
        'min_reserve_second_currency',
        'limit',
        'margin',
        'commission',
        'cashback',
        'ref_bonus'
    ];

    public function getFirstCurrency()
    {
        return $this->hasOne(Currency::class, 'first_currency_id', 'id');
    }

    public function getSecondCurrency()
    {
        return $this->hasOne(Currency::class, 'second_currency_id', 'id');
    }
}
