<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'description'];

    public function search($filter = null)
    {
        $results = $this->where('name', 'LIKE', "%{$filter}%")
                        ->orWhere('description', 'LIKE', "%{$filter}%")
                        ->paginate();
        return $results;
    }

    /**
     * Get Permissions
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * Get Plan
     */
    public function plans()
    {
        return $this->belongsToMany(Plan::class);
    }

    /**
     * Permission not linked with this profile
     */
    public function permissionsAvaliable($filter = null)
    {
        $permissions = Permission::whereNotIn('id', function($query) {
            $query->select('permission_profile.permission_id');
            $query->from('permission_profile');
            $query->whereRaw("permission_profile.permission_id = {$this->id}");
        })
        //->where('permission.name', 'LIKE', "%{$filter}%")
        ->where(function ($queryFilter) use ($filter) {
            if ($filter) {
                $queryFilter->where('permission.name', 'LIKE', "%{$filter}%");
            }
        })
        ->paginate();

        return $permissions;
    }
}
