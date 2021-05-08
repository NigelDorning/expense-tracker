<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function getSavingsPercentageAttribute()
    {
        if (
            $this->yearly_savings_current > 0 
            && $this->yearly_savings_target > 0
        ) {
            $percent = ($this->yearly_savings_target - $this->yearly_savings_current) / $this->yearly_savings_target * 100;
            return number_format(abs(100 - $percent), 2);
        } elseif (
            $this->yearly_savings_current == 0
            || $this->yearly_savings_current < 0
        ) {
            return 0;
        } elseif (
            $this->yearly_savings_current > 0
            && $this->yearly_savings_target == 0
        ) {
            return 100;
        }
    }
}
