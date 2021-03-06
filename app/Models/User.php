<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Storage;
use DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function set()
    {
        return $this->belongsTo(Set::class);
    }

    public function member()
    {
        return $this->hasOne(SetMember::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function getProfilePhotoUrlAttribute()
    {
        return $this->avatar ? Storage::url($this->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($this->fullname) . '&color=7F9CF5&background=EBF4FF';
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function scopeWhereFullName($query, $value) {
        $query->where(DB::raw('concat(first_name, " ", last_name)'), 'LIKE', "%{$value}%");
    }
}
