<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['name', 'url', 'price', 'description'];

    public function details()
    {
        return $this->hasMany(DetailPlan::class);
    }

    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }

    public function tenants()
    {
        return $this->hasMany(Tenant::class);
    }

    public function search($filter = null)
    {
        $results = $this->where('name', 'LIKE', "%{$filter}%")
                        ->orWhere('description', 'LIKE', "%{$filter}%")
                        ->paginate();
        return $results;
    }

    /**
     * Profile not linked with this plan
     */
    public function profilesAvaliable($filter = null)
    {
        $profiles = Profile::whereNotIn('id', function($query) {
            $query->select('plan_profile.profile_id');
            $query->from('plan_profile');
            $query->whereRaw("plan_profile.profile_id = {$this->id}");
        })
        //->where('profile.name', 'LIKE', "%{$filter}%")
        ->where(function ($queryFilter) use ($filter) {
            if ($filter) {
                $queryFilter->where('profile.name', 'LIKE', "%{$filter}%");
            }
        })
        ->paginate();

        return $profiles;
    }
}

