<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Payroll;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'logo',
        'website',
    ];

    protected $appends = ['logo_url'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'company_user');
    }

    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    public function designations()
    {
        return $this->hasManyThrough(Designation::class, Department::class);
    }

    public function payrolls()
    {
        return $this->hasMany(Payroll::class);
    }

    protected function logoUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->logo 
                ? asset('storage/' . $this->logo) 
                : asset('images/default-logo.png')
        );
    }

    
}