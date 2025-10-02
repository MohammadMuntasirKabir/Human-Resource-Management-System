<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Designation;
use App\Models\Department;
use App\Models\Salary;
use App\Models\Payment;
use App\Models\Contract;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'designation_id',
        'address',
    ];

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }

    public function department()
    {
        return $this->hasOneThrough(
            Department::class,
            Designation::class,
            'id',
            'id',
            'designation_id',
            'department_id'
        );
    }

    public function scopeInCompany(Builder $query, ?int $companyId = null): Builder
    {
        $companyId = $companyId ?? session('company_id');
        return $query->whereHas('designation.department', fn ($q) => $q->where('company_id', $companyId));
    }

    public function scopeSearchByName(Builder $query, string $name): Builder
    {
        return $query->where('name', 'like', "%{$name}%");
    }

    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function getActiveContractAttribute()
    {
        return $this->contracts()->active()->first();
    }

    public function getActiveContract(?string $date = null)
    {
        $date = $date ? Carbon::parse($date) : now();
        return $this->contracts()
            ->where('start_date', '<=', $date)
            ->where('end_date', '>=', $date)
            ->first();
    }
}