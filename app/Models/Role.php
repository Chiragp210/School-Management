<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public $timestamps = false;


    protected $fillable = [
        'role_name'
    ];

    //this function is define the admin and role relations
    public function admin()
    {
        return $this->hasMany(Admin::class, 'role_id', 'id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions');
    }

    public function hasPermission($permissionName)
    {
        return $this->permissions()->where('permission_name', $permissionName)->exists();
    }
}
