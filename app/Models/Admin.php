<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    public $timestamps = false;

    protected $guard = 'admin';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'username',
        'password',
        'role_id'
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    // Define the role relationship with Admin
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);  // Many-to-Many relationship
    }

    public function hasPermission($permission)
    {
        if ($this->role && $this->role->permissions) {
            return $this->role->permissions->contains('permission_name', $permission);
        }
        return false;
    }
}
