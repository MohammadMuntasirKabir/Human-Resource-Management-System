<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Department;
use App\Models\Employee;

class Designation extends Model
{
    protected $fillable = [
        'name',
        'department_id',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function scopeInCompany(Builder $query, ?int $companyId = null): Builder
    {
        $companyId = $companyId ?? session('company_id');
        return $query->whereHas('department', fn ($q) => $q->where('company_id', $companyId));
    }
}