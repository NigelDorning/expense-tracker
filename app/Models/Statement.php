<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statement extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'amount',
        'type',
        'when',
        'recurring',
        'user_id'
    ];

    protected $casts = [
        'when' => 'date'
    ];

    const INCOME_TYPES = [
        'Salary',
        'Profit',
        'Interest',
        'Dividend',
        'Rental',
        'Capital Gains',
        'Royalty',
        'Residual'
    ];

    const EXPENSE_TYPES = [
        'Housing',
        'Transportation',
        'Food',
        'Utilities',
        'Medical/Healthcare',
        'Insurance',
        'Taxes',
        'Education/Childcare',
        'Debt',
        'Household Items/Supplies',
        'Personal Care',
        'Clothing',
        'Entertainment/Subscriptions',
        'Travel',
        'Pets',
        'Gifts/Donations',
        'Miscellaneous',
    ];
}
