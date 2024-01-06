<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Currency;

class Exchange extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_currency_id',
        'second_currency_id',
        'sum',
        'status'
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
