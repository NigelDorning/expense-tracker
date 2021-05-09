<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavingsGoal extends Model
{
    use HasFactory;

    protected $fillable = [
        'for_year',
        'target',
        'current',
        'user_id'
    ];

    public function getSavingsPercentageAttribute()
    {
        if ($this->current > 0 && $this->target > 0) {
            $percent = ($this->target - $this->current) / $this->target * 100;
            return number_format(abs(100 - $percent), 2);
        } elseif ($this->current == 0 || $this->current < 0) {
            return 0;
        } elseif ($this->current > 0 && $this->target == 0) {
            return 100;
        }
    }
}
