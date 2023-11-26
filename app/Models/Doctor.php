<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Doctor extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $guard_name = 'doctor';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected static function booted(): void
    {
        static::creating(function (Doctor $doctor) {
            $doctor->password = Hash::make('doctor12345');
            $doctor->assignRole('doctor');
        });
    }


    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'doctor_id');
    }

    // public function appointments()
    // {
    //     return $this->hasMany(Appointment::class, 'patient_id');
    // }

    // public function createdAppointments()
    // {
    //     return $this->hasMany(Appointment::class, 'created_by');
    // }

    // public function updatedAppointments()
    // {
    //     return $this->hasMany(Appointment::class, 'updated_by');
    // }
}
