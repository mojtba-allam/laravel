<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Job extends Model {
    use HasFactory;

    protected $table = 'job_listings';

    protected $guarded = [];

    protected $appends = ['can_edit'];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey: "job_listing_id");
    }

    public function getCanEditAttribute()
    {
        $user = Auth::user();
        return $user ? $user->can('edit', $this) : false;
    }
}