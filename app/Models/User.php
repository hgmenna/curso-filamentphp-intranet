<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use BezhandSAlleh\FilamentShield\Traits\HasPanelShield;
use BezhanSalleh\FilamentShield\Traits\HasPanelShield as TraitsHasPanelShield;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles, TraitsHasPanelShield;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'country_id',
        'state_id',
        'city_id',
        'address',
        'postal_code',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function calendars() {
        return $this->belongsToMany(Calendar::class);
    }

    public function departments() {
        return $this->belongsToMany(Departament::class);
    }

    public function holidays() {
        return $this->hasMany(Holiday::class);
    }

    public function timesheets() {
        return $this->hasMany(Timesheet::class);
    }


}
