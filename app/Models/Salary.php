<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Payroll;
use App\Models\Employee;

class Salary extends Model
{
    protected $fillable = [
        'payroll_id',
        'employee_id',
        'gross_salary',
    ];

    protected $casts = [
        'gross_salary' => 'decimal:2',
    ];

    public function payroll()
    {
        return $this->belongsTo(Payroll::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function scopeInCompany(Builder $query, ?int $companyId = null): Builder
    {
        $companyId = $companyId ?? session('company_id');
        return $query->whereHas('payroll.company', fn ($q) => $q->where('id', $companyId));
    }
}