<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'recurring_next' => 'date'
    ];

    const STATEMENT_TYPES = [
        'income' => [
            'Salary',
            'Profit',
            'Interest',
            'Dividend',
            'Rental',
            'Capital Gains',
            'Royalty',
            'Residual'
        ],

        'expense' => [
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
        ]
    ];

    public function setWhenAttribute($value)
    {
        $this->attributes['when'] = is_null($value) 
            ? null
            : Carbon::createFromFormat('d/m/Y', $value)->toDateString();
    }

    public function getWhenAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::saving(function ($statement) {
            $date = Carbon::createFromFormat('d/m/Y', $statement->when);

            $statement->recurring_next = match ($statement->recurring_schedule) {
                'daily' => $date->addDay(),
                'weekly' => $date->addWeek(),
                'monthly' => $date->addMonth(),
                'quarterly' => $date->addMonths(3),
                'biannually' => $date->addMonths(6),
                'yearly' => $date->addYear(),
                default => null
            };
        });
    }
}
